<!DOCTYPE html>
<html>
<head>
    <title>{{$user->name." ". $user->surname." "."CV"}}</title>
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    <style>
        /* Write CSS Here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .full {
            width: 100%;
            max-width: 100%;
            height: 100% !important;
            color: white;


        }

        .left {
            position: initial;
            background-color: #004b82;
            width: 45%;
            height: 100%;
            float: left;
            page-break-inside: avoid;
        }

        .right {
            background-color: white;
            width: 54%;
            height: 100%;
            float: left;
            color: #5f5f5f;
            page-break-inside: avoid;
            padding-left: 1%;
            padding-top:2%;
        }

        .image {
            padding-left: 15%;
            border-bottom: 0.1px solid cyan;
            padding-bottom: 6%;
        }


        .headers {
            background-color: white;
            padding-bottom: 2px;
            padding-top: 2px;
            margin-top: 2px;
            margin-bottom: 2px;
            padding-left: 10px;
        }

        .left-lists {
            padding-left: 30px;
            font-size: 18px;
        }

        .right-lists {
            font-size: 18px;
            padding-left: 30px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .right table tr td h1{
            color:#5f5f5f;
        }

        .headers h2 {
            color: #1a3e6f;
        }

        footer {
            position: fixed;
            bottom: -100px;
            left: 0px;
            right: 0px;
            height: 200px;
            font-size: 20px !important;
            color: white !important;
            line-height: 35px;
            width: 100%;
        }


        .bio {
            text-align: center;
            margin-bottom: 6%;
        }


        .right-top-header {
            color: white;
            background-color: #004b82;
            text-align: center;
            height: 5%;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .right h1, h2 {
            padding-left: 10px;
        }

        .right table h2 {
            padding-left: 2px;
        }


        th, td {
            padding: 7px;
        }

        .revenue-table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            vertical-align: top;
        }
        .revenue-table tr, .revenue-table td{
            border:0.1px solid black;
        }

        .revenue-table th {
            color: white;
        }
        .clear{
            clear:both;
            background-color:#004b82;
            height: 100%;
            width:45%;
        }
    </style>
</head>
<body>
<div class="full">
    <div class="left">
        <div class="image">
            <img src="{{public_path('assets/images/sapro_cv_header_image.png')}}" alt="gfg-logo">
        </div>
        <div class="Contact">
            <div class="bio">
                <h2>AUDIT BIO</h2>
                <h2>{{$user->saproId}}</h2>
                <h2>{{$user->name." ".$user->surname}}</h2>
                <h3>{{$user->nationality}}</h3>
            </div>
            <div class="headers">
                <h2>CERTIFICATIONS & EDUCATION:</h2>
            </div>
            <ul class="left-lists">
                @foreach($user->certificationsAndEducation as $certification)
                    @if($certification->approved)
                    <li>
                        <span>{{$certification->institute ." , ".$certification->certificationsAndEducation." , ".\Carbon\Carbon::createFromDate($certification->year)->format('Y')}}</span>
                    </li>
                    @endif

                @endforeach
            </ul>
            <div class="headers">
                <h2>ADDITIONAL EXPERIENCE:</h2>
            </div>
            <ul class="left-lists">
                @foreach($user->additionalExperiences as $addExp)
                    @if($addExp->approved)
                    <li><span>{{$addExp->additionalExperience}}</span></li>
                    @endif
                @endforeach
            </ul>

            <div class="headers">
                <h2>INTERNATIONAL EXPERIENCE:</h2>
            </div>
            <ul class="left-lists">
                @foreach($user->internationalExperiences as $interExp)
                    @if($interExp->approved)
                    <li>
                        <span>{{\Illuminate\Support\Carbon::createFromDate($interExp->startPeriod)->format('M') .". ". \Illuminate\Support\Carbon::createFromDate($interExp->startPeriod)->format('Y') ." to ".\Carbon\Carbon::createFromDate($interExp->endPeriod)->format('M').". ".\Carbon\Carbon::createFromDate($interExp->endPeriod)->format('Y')}}</span><br>
                        <span>{{$interExp->city.", ".$interExp->country}}</span><br>
                        <span>{{$interExp->sector}}</span>
                    </li>
                    @endif
                @endforeach
            </ul>

            <div class="headers">
                <h2>AUDITED LISTED CLIENTS:</h2>
            </div>
            <ul class="left-lists">
                @foreach($user->listedClients as $listedClient)
                    @if($listedClient->approved)
                    <li>
                        <span>{{$listedClient->listedClient}}</span>
                    </li>
                    @endif
                @endforeach
            </ul>
            <div class="headers">
                <h2>SOFTWARE SKILLS:</h2>
            </div>
            <ul class="left-lists">
                @foreach($user->softwareExperiences as $software)
                    @if($software->approved)
                    <li>
                        <span>{{$software->level.": ".$software->softwareExperience}}</span>
                    </li>
                    @endif
                @endforeach
            </ul>
            <div class="headers">
                <h2>ACHIEVEMENTS:</h2>
            </div>
            <ul class="left-lists">
                @foreach($user->achievements as $achievement)
                    @if($achievement->approved)
                    <li>
                        <span>{{$achievement->achievement}}</span>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="right">
        <div class="right-top-header">
            <h2>{{strtoupper($user->seniorityLevel->seniorityLevelDescription??"")}}</h2>
        </div>
        <h1>PROFESSIONAL EXPERIENCE:</h1>
        <ul class="right-lists">
            @foreach($user->professionalExperience as $profExp)
                @if($profExp->approved)
                <li>{{$profExp->professionalExperience}}</li>
                @endif
            @endforeach
        </ul>

        <h1>FIRM EXPERIENCE:</h1>
        <table style="width: 100%;color:#5f5f5f">
            @foreach($user->firmExperiences as $firmExp)
                @if($firmExp->approved)
                <tr>
                    <td><span>{{\Carbon\Carbon::createFromDate($firmExp->startPeriod)->format('M').". ".\Carbon\Carbon::createFromDate($firmExp->startPeriod)->format('Y')." to ".\Carbon\Carbon::createFromDate($firmExp->endPeriod)->format('M').". ".\Carbon\Carbon::createFromDate($firmExp->endPeriod)->format('Y')}}</span></td>
                    <td style="padding-left: 7%; text-align: start"><span>{{$firmExp->company.", ".$firmExp->level.", ".$firmExp->country}}</span></td>
                </tr>
                @endif
            @endforeach
        </table>

        <table style="width: 100%; color:#5f5f5f">
            <tr>
                <td><h1>INDUSTRIES:</h1></td>
                <td  style="padding-left: 3%; text-align: start">
                    @foreach($user->industries as $industry)
                        @if($industry->approved)
                        <span>{{$industry->industry. ", "}}</span>
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr>
                <td><h1>SECTORS:</h1></td>
                <td  style="padding-left: 3%;">
                    @foreach($user->sectors as $sector)
                        @if($sector->approved)
                        <span>{{$sector->sector. ", "}}</span>
                        @endif
                    @endforeach
                </td>
            </tr>
        </table>

        <table class="revenue-table" border="true"  style="color:#5f5f5f;">
            <thead>
            <tr class="text-white" style="background-color: #014c84">
                <th>Main Clients ('000)</th>
                <th>Sector</th>
                <th>Time On Client</th>
                <th style="white-space: nowrap">Audit Work Performed</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->clientRevenues as $revenue)
                @if($revenue->approved)
                <tr>
                    <td>
                        {{$revenue->mainClient}}
                        <br><br>
                        {{"( +/- $ ".number_format($revenue->revenue,2,'.',',')." )"}}
                    </td>
                    <td>{{$revenue->sector}}</td>
                    <td>{{$revenue->timeOnClient}}</td>
                    <td>
                        <ul style="margin-left: 10px;">
                            @if($revenue->auditedWork)
                                @foreach($revenue->auditedWork as $work)
                                    <li style="white-space:nowrap"><span>{{$work->auditWorkPerformed}}</span></li>
                                @endforeach
                            @endif
                        </ul>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>

    </div>

{{--    <div class="clear"></div>--}}
</div>
</body>
</html>
