@extends('admin.layout.default')

@section('title')
{{ $title='Danh sách học sinh' }}
@stop
@section('content')
	<div class="row margin-bottom">
	    <div class="col-xs-12">
        	{{ renderUrl('ManagerStudentController@create', '<i class="glyphicon glyphicon-plus-sign"></i> Thêm học sinh mới', [], ['class' => 'btn btn-primary']) }}
	    </div>
	</div>
	<div class="margin-bottom">
	    @include('student.filter')
	</div>
	@if( count($data) )
		<div class="box box-primary">
			<table class ="table table-bordered table-striped table-hover">
				<tr>
					<th>{{ trans('common.order') }}</th>
					<th>{{ trans('common.fullname') }}</th>
					<th>Email</th>
					<th>Phone</th>
					<th>{{ trans('common.level') }}</th>
					<th>{{ trans('common.lesson_number') }}</th>
					<th>{{ trans('common.lesson_number_finish') }}</th>
					<th>{{ trans('common.lesson_number_cancel') }}</th>
					<th>{{ trans('common.lesson_number_remain') }}</th>
					<th>{{ trans('common.hour_remain') }}</th>
					<th>{{ trans('common.student_status') }}</th>
					<th>{{ trans('common.student_action') }}</th>
				</tr>
					@foreach($data as $key => $student)
						<tr data-html="true" data-toggle="tooltip" data-placement="auto" title="<img src='{{ !empty($student->avatar) ? url($student->avatar) : NO_IMG }}' width='150px'>" >
							<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
							@if(checkRemain($student))
							<td style="color: red"><b>{{ $student->full_name }}</b></td>
							@else
							<td>{{ $student->full_name }}</td>
							@endif
							<td>{{ $student->email }}</td>
							<td>{{ $student->phone }}</td>
							<td>{{ Common::getLevelNameByStudent($student) }}</td>
							@if(Common::getScheduleByStudent($student))
								<td>{{ Common::getScheduleByStudent($student)->lesson_number }}</td>
								<td>{{ Common::getNumberLessonStatus(Common::getScheduleByStudent($student)->id, FINISH_LESSON) }}</td>
								<td>{{ Common::getNumberLessonStatus(Common::getScheduleByStudent($student)->id, CANCEL_LESSON) }}</td>
								@if(checkRemain($student))
								<td style="color: red"><b>
								{{ Common::getScheduleByStudent($student)->lesson_number - Common::getNumberLessonStatus(Common::getScheduleByStudent($student)->id, FINISH_LESSON) }}</b>
								</td>
								@else
								{{ Common::getScheduleByStudent($student)->lesson_number - Common::getNumberLessonStatus(Common::getScheduleByStudent($student)->id, FINISH_LESSON) }}
								@endif
								<td>{{ Common::getDurationTimeStudentByStudent($student->id) }}</td>
								
								@if(Common::getScheduleByStudent($student)->status == WAIT_APPROVE_GMO)
									@if(Common::checkTeacherOfGmo($student))
									<td>
									{{ Form::open(array('method'=>'POST', 'action' => array('ManagerStudentController@approveStudent', Common::getScheduleByStudent($student)->id), 'style' => 'display: inline-block;')) }}
			                            <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn approve?');">Approve giáo viên {{ Common::getNameTeacherBySchedule(Common::getScheduleByStudent($student), 'full_name') }}</button>
			                        {{ Form::close() }}
			                        {{ Form::open(array('method'=>'POST', 'action' => array('ManagerStudentController@rejectStudent', Common::getScheduleByStudent($student)->id), 'style' => 'display: inline-block;')) }}
			                            <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn reject?');">Reject giáo viên {{ Common::getNameTeacherBySchedule(Common::getScheduleByStudent($student), 'full_name') }}</button>
			                        {{ Form::close() }}
									</td>
									@else
									<td>Không đượt duyệt</td>
									@endif
								@else
								<td>{{ Common::getStatusSchedule(Common::getScheduleByStudent($student)->id) }}</td>
								@endif
							@endif
							<td>
								{{ renderUrl('ManagerStudentController@edit', 'Sửa', [$student->id], ['class' => 'btn btn-warning']) }}
								@if (userAccess('student.delete'))
									{{ Form::open(array('method'=>'DELETE', 'action' => array('ManagerStudentController@destroy', $student->id), 'style' => 'display: inline-block;')) }}
										<button title="Delete" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="glyphicon glyphicon-remove"></i></button>
									{{ Form::close() }}
								@endif
							</td>
						</tr>
					@endforeach
			</table>
			<div class="clear clearfix"></div>
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	@else
		<div class="alert alert-warning">{{ trans('common.no_data') }}</div>
	@endif
@stop