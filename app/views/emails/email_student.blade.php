<div style="padding:60px 5%;background-color:#e74c3c;max-width:820px">
    <div style="max-width:560px;text-align:center;margin:auto;padding-bottom:20px;border-bottom:3px solid #16b53b">
        <img src="/20180324_084211.png" style="width:130px;margin:auto">
    </div>
    <div style="max-width:560px;background-color:#fff;margin:auto">
        <div style="background-color:#fff;padding:40px 40px">
            <p style="font-size:14px;line-height:20px"><b>Hi {{ ucwords(Common::getObject($lessonDetail->student, 'full_name')) }}!</b></p>
            <p style="font-size:14px;line-height:20px">Stayhomeenglish xin chào</p>
            <p style="font-size:14px;line-height:20px">Chúc mừng Bạn vừa hoàn thành 01 buổi học trên Stayhomeenglish  với nội dung như sau:</p>
            <p style="color:#16b53b;font-size:14px;font-weight:bold;text-decoration:none;text-transform:uppercase;line-height:20px">Thông tin chi tiết:</p>
            <div style="background-color:#e8e8e8;padding:15px 20px;margin-bottom:30px">
                <table>
                    <tbody>
                        <tr>
                            <td>Learner's name (Tên học viên):</td>
                            <td width="200px">{{ ucwords(Common::getObject($lessonDetail->student, 'full_name')) }}</td>
                        </tr>
                        <tr>
                            <td>Teacher's name (Tên giáo viên):</td>
                            <td>{{ ucwords(Common::getObject($lessonDetail->teacher, 'full_name')) }}</td>
                        </tr>
                        <tr>
                            <td>Trình độ (Level):</td>
                            <td>{{ $lessonDetail->level }}</td>
                        </tr>
                        <tr>
                            <td>Duration (Thời lượng):</td>
                            <td>{{ $lessonDetail->lesson_duration }} minute(s) (phút)</td>
                        </tr>
                        <tr>
                            <td>Date (Ngày, giờ):</td>
                            <td>{{ date('H:i d-m-Y', strtotime($lessonDetail->lesson_date.' '.$lessonDetail->lesson_hour)) }}</td>
                        </tr>
                        <tr>
                            <td>Remaining hours (Số giờ còn lại):</td>
                            <td>{{ Common::getRemainTimeStudent($lessonDetail) }}</td>
                        </tr>
                        <tr>
                            <td>
                                Course's remaining hours after confirm this session (Số giờ còn lại của khóa học sau khi xác nhận buổi học này):
                            </td>
                            <td>{{ Common::getRemainTimeStudentAfterConfirm($lessonDetail) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p style="font-size:14px;line-height:20px">Nếu thông tin cập nhật đã chính xác, bạn vui lòng click vào nút dưới đây:</p>
            <a href="{{ action('PublishController@confirmEmail', [$string, $lessonDetail->id]) }}" style="border-radius:25px;color:#fff;min-width:200px;font-size:14px;line-height:40px;text-align:center;font-weight:600;margin-right:10px;border:0;background-color:#16b53b;display:inline-block;height:40px;padding:0 20px;margin:15px 0 30px">Xác nhận thông tin chính xác</a>
            <a href="" >
                <img src="https://ci6.googleusercontent.com/proxy/MvjJmx6sg9-BTWby5eCis1g9Fwdon1wRrCtNRLhZCuQ8y0Ktc1vHMfIalkmdHSzYVmuhGC94evudB_k0iGHqldWeLeZVkCJQfl46p44nO9CI=s0-d-e1-ft#https://files.Stayhomeenglish.com/global/emails/Banner_Referral.png" alt="Banner Referral">
            </a>
            <p style="font-size:14px;line-height:20px">Mời bạn vui lòng xác nhận trong vòng 24 giờ, quá thời gian này chúng tôi sẽ ghi nhận thông tin buổi học là chính xác.</p>
            <p style="font-size:14px;line-height:20px">Nếu nhận thấy thông tin buổi học chưa chính xác, bạn vui lòng thông báo với nhân viên Quản lý lớp học để được hỗ trợ tốt nhất.</p>

            <p style="font-size:14px;line-height:20px"><i>(Note: Đây là email tự động được gửi đến bạn, vui lòng không trả lời email này.)</i></p>
            <div>
                <p style="font-size:14px;line-height:20px">Để hỗ trợ các vấn đề về lớp học, xin vui lòng liên hệ:</p>

                <p style="font-size:14px;line-height:20px"><b>Quản lý lớp học</b></p>

                <p style="font-size:14px;line-height:20px"><b>Hotline Stayhomeenglish:</b> 0909 636 002</p>

                <p style="font-size:14px;line-height:20px">Stayhomeenglish Xin chân thành cảm ơn sự đồng hành của Bạn!</p>
                <p style="font-size:14px;line-height:20px"><b>Best regards, Stayhomeenglish</b></p>
            </div>
        </div>
    </div>
    <div style="background-color:#fafbfc;border-top:3px solid #16b53b;text-align:center;padding:40px 0">
        <ul style="list-style-type:none;margin-bottom:35px">
            <li style="display:inline-block;padding-right:20px"><a href="" style="text-decoration:none;text-transform:uppercase;font-size:12px;color:#0d1c31;font-weight:bold;line-height:1.75;letter-spacing:1.2px" >Our blog</a> <span style="display:inline-block;width:3px;height:3px;background-color:#000;border-radius:50%;margin-left:20px;margin-bottom:3px"></span></li>
            <li style="display:inline-block;padding-right:20px"><a href="" style="text-decoration:none;text-transform:uppercase;font-size:12px;color:#0d1c31;font-weight:bold;line-height:1.75;letter-spacing:1.2px">Help center</a> <span style="display:inline-block;width:3px;height:3px;background-color:#000;border-radius:50%;margin-left:20px;margin-bottom:3px"></span></li>
            <li style="display:inline-block;padding-right:20px"><a href="">Policies</a></li>
        </ul>
        <div class="m_7432707941994324624m_-5101721924476599082address">
            <p style="color:#898d89;margin:0">Made by <span style="color:#0d1c31">Stayhomeenglish INTERNATIONAL PTE. LTD.</span></p>
            <p style="color:#898d89;margin:0">10 <a href="">Anson Road, #26-04</a>, International Plaza, Singapore 079903</p>
            <ul style="list-style-type:none;margin:0">
                <li style="display:inline-block;padding:0 10px"><a href="mailto:hello@Stayhomeenglish.com" style="color:#0d1c31;text-decoration:none">hello@Stayhomeenglish.com</a> <span style="margin-left:20px">|</span></li>
                <li style="display:inline-block;padding:0 10px"><a href="" style="color:#0d1c31;text-decoration:none">1900 636 002</a> <span style="margin-left:20px">|</span></li>
            </ul>
        </div>
        <ul class="m_7432707941994324624m_-5101721924476599082socials" style="margin-top:50px;list-style-type:none">
            <li style="display:inline-block;padding:0 20px"><a href=""><img src="" style="width:15px" id="m_74327079419943246241521453282318" class="CToWUd"></a></li>
            <li style="display:inline-block;padding:0 20px"><a href=""><img src="" style="width:15px"></a></li>
            <li style="display:inline-block;padding:0 20px"><a href=""><img src="" style="width:15px"></a></li>
            <li style="display:inline-block;padding:0 20px"><a><img src="" style="width:15px"></a></li>
        </ul>
    </div>
</div>