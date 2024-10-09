<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> EduBlogHub</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body>
    <div class="container">
        <h1>Meeting Details</h1>

        <div id="meetingStatus">
            @if(session('meetingUrl'))
            <div class="alert alert-success">
                Here is your meeting link: <a href="{{ session('meetingUrl') }}"
                    target="_blank">{{ session('meetingUrl') }}</a>
            </div>
            @else
            <div class="alert alert-warning">
                No meeting link available.
            </div>
            @endif
        </div>

        <h2>Course Materials</h2>
        <!-- هنا يمكنك إضافة محتوى الدروس أو أي محتوى آخر تودين عرضه -->

        @if(session('meetingUrl'))
        <h2>Join the Meeting</h2>
        <a href="{{ session('meetingUrl') }}" target="_blank" class="btn btn-primary">Join Meeting</a>
        @endif
    </div>


    <script>
    const meetingUrl = "{{ session('meetingUrl') }}"; // استخدمي Blade لتضمين الرابط

    if (meetingUrl) {
        const meetingStatusDiv = document.getElementById('meetingStatus');
        meetingStatusDiv.innerHTML = `
        <div class="alert alert-success">
            Here is your meeting link: <a href="${meetingUrl}" target="_blank">${meetingUrl}</a>
        </div>
    `;

        // افتحي الرابط في نافذة جديدة عند النقر
        const joinButton = document.createElement('button');
        joinButton.textContent = 'Join Meeting';
        joinButton.onclick = function() {
            window.open(meetingUrl, '_blank');
        };
        meetingStatusDiv.appendChild(joinButton);
    }
    </script>
</body>

</html>
