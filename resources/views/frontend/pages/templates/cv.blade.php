<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }
        .page {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            overflow: hidden;
        }
        .top-bar {
            height: 100px;
            background-color: #848484;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        .name {
            font-family: 'Raleway', sans-serif;
            font-size: 36px;
            letter-spacing: 2px;
            font-weight: 100;
            line-height: 40px;
        }
        .side-bar {
            width: 35%;
            float: left;
            background-color: #f7e0c1;
            padding: 20px;
            box-sizing: border-box;
        }
        .content-container {
            width: 60%;
            float: right;
            padding: 20px;
            box-sizing: border-box;
        }
        .mugshot {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            height: 100px;
            width: 100px;
            background-color: #ccc;
            border-radius: 50%;
            display: inline-block;
            line-height: 100px;
            font-size: 40px;
            color: #333;
            text-align: center;
            font-family: "Montserrat", sans-serif;
            background-image: url('{{asset('profile/'.$seeker->user->image)}}');
            background-size: cover;
            object-fit: cover;
        }
        .social {
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .social img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        .side-header {
            font-size: 16px;
            font-weight: 600;
            margin-top: 20px;
            border-bottom: 1px solid #888;
            padding-bottom: 5px;
        }
        .list-thing {
            margin: 5px 0;
        }
        h2.title {
            text-align: center;
            margin: 20px 0;
        }
        .separator {
            width: 100%;
            height: 2px;
            background-color: #999;
            margin: 10px 0;
        }
        .greyed {
            background-color: #ddd;
            padding: 10px;
            text-align: center;
            font-weight: 600;
        }
        .long-margin {
            margin: 10px 0;
        }
        h3 {
            margin-top: 20px;
        }
        .footer{
            display: flex;
            
        }
    </style>
</head>
<body>
    <div class="page" id="cv">
        <div class="top-bar">
            <div class="name">{{$seeker->full_name}}</div>

        </div>
        <div class="footer">
            <div class="side-bar" style="flex-grow: 2">
                <div class="mugshot">
                    <div class="logo"></div>
                </div>
                <p>{{$seeker->full_name}}</p>
                <p>{{$seeker->contact_number}}</p>
                <p>{{$seeker->user->email}}</p><br>
                <div class="social">
                    <img src="https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Twitter-07-128.png" alt="Twitter">
                    Twitter stuff
                </div>
                <div class="social">
                    <img src="https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Pinterest-23-128.png" alt="Pinterest">
                    Pinterest things
                </div>
                <div class="social">
                    <img src="https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_LinkedIn-128.png" alt="LinkedIn">
                    Linked-in man
                </div>
                <div class="side-header">Skills</div>

                
                @foreach (explode(', ', $seeker->skills) as $item)
                <p class="list-thing">{{$item}}</p>
                @endforeach

                <hr>
                Copyright by Ujob.
            </div>
            <div class="content-container " style="flex-grow: 4">
                <h2 class="title">{{$seeker->headline}}</h2>
                <div class="separator"></div>
                <div class="greyed">Profile</div>
                <p class="long-margin">{{$seeker->summary}}</p>
                <div class="greyed">Experiences</div>
                @php
                        $expId = 1;
                        $eduId = 1;
                        $proId = 1;
                @endphp
                @foreach ($seeker->seekerExperiences as $data)
                    
                    <h3>Job #{{$expId++}}</h3>
                    <p class="light">{{$data->title}} - ({{$data->start_date}} -> {{$data->end_date ?? "Present"}})</p>
                    <p class="justified">{{$data->company}}</p>
                @endforeach
                <div class="greyed">Educations</div>
                @foreach ($seeker->seekerEducations as $data)
                    <h3>School #{{$eduId++}}</h3>
                    <p class="light">{{$data->degree}} - ({{$data->start_date}} -> {{$data->end_date ?? "Present"}})</p>
                    <p class="justified">{{$data->institution}}</p>
                @endforeach
                <div class="greyed">Recent Projects</div>
                @foreach ($seeker->seekerProjects as $data)
                    <h3>Project #{{$proId++}}</h3>
                    <p class="light">{{$data->title}} - ({{$data->start_date}} -> {{$data->end_date ?? "Present"}})</p>
                    <p class="justified">{{$data->description}}</p>
                @endforeach
                <hr>
                
                
            </div>
        </div>
    </div>
    <button id="downloadPdf"
        style="
        color: #ffffff;
    background-color: #FFC000;
    line-height: 26px;
    padding: 10px 25px;
    box-shadow: 0px 18px 40px rgba(25, 15, 9, 0.1);
    border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    border-radius: 8px;
    font-size: 14px;
    display: inline;
    position: fixed;
    bottom: 20px;
    right: 20px;
        "
    >Download as PDF</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        document.getElementById('downloadPdf').addEventListener('click', function () {
            const element = document.getElementById('cv');
            html2pdf(element, {
                margin: 0.5,
                filename: 'cv.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            });
            console.log('success');

        });
    </script>
</body>
</html>
