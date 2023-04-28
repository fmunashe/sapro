<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 17/4/2022
 * Time: 08:19
 */
?>
<ul class="side-nav">
    <hr>
    @if(auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::USER)
        <li class="side-nav-item">
            <a href="{{route('users.index')}}" class="side-nav-link">
                <i class="uil-users-alt"></i>
                <span>@if(auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN) Users @else My Profile @endif </span>
            </a>
        </li>
    @endif

    @if(auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::CLIENT)
        <li class="side-nav-item">
            <a href="{{route('client-requests.index')}}" class="side-nav-link">
                <i class="uil-newspaper"></i>
                <span>Requests </span>
            </a>
        </li>
    @endif


    @if(auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN)
        <li class="side-nav-item">
            <a href="{{route('generic')}}" class="side-nav-link">
                <i class="uil-file-search-alt"></i>
                <span>Generic Match Query </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('seniority-levels.index')}}" class="side-nav-link">
                <i class="uil-money-stack"></i>
                <span>Seniority Levels </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('specialisation.index')}}" class="side-nav-link">
                <i class="uil-graduation-hat"></i>
                <span>Specialisation </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('contract-status.index')}}" class="side-nav-link">
                <i class="uil-file-edit-alt"></i>
                <span>Contract Status </span>
            </a>
        </li>
    @endif

    {{--    <li class="side-nav-item">--}}
    {{--        <a href="{{route('fact-external-clients.index')}}" class="side-nav-link">--}}
    {{--            <i class="uil-chat-bubble-user"></i>--}}
    {{--            <span>Fact External Clients </span>--}}
    {{--        </a>--}}
    {{--    </li>--}}
    @if(auth()->user()->type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->type ==\App\Enums\UserTypeEnum::USER)

        <li class="side-nav-item">
            <a href="{{route('certifications.index')}}" class="side-nav-link">
                <i class="uil-award"></i>
                <span>Certification & Education </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('achievements.index')}}" class="side-nav-link">
                <i class="uil-trophy"></i>
                <span>Achievements </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('firm-experience.index')}}" class="side-nav-link">
                <i class="uil-folder-info"></i>
                <span>Firm Experience </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('additional-experience.index')}}" class="side-nav-link">
                <i class="uil-shop"></i>
                <span>Additional Experience </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('client-revenue.index')}}" class="side-nav-link">
                <i class="uil-moneybag"></i>
                <span>Client Revenue </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('first-time-audit-clients.index')}}" class="side-nav-link">
                <i class="uil-user-plus"></i>
                <span>First Time Audit Clients </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('host-firms.index')}}" class="side-nav-link">
                <i class="uil-file-blank"></i>
                <span>Host Firms </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('industries.index')}}" class="side-nav-link">
                <i class="uil-money-withdraw"></i>
                <span>Industries </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('international-experience.index')}}" class="side-nav-link">
                <i class="uil-plane-fly"></i>
                <span>International Experience </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('listed-clients.index')}}" class="side-nav-link">
                <i class="uil-list-ui-alt"></i>
                <span>Listed Clients </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('professional-experience.index')}}" class="side-nav-link">
                <i class="uil-chart-growth"></i>
                <span>Professional Experience </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('software-experience.index')}}" class="side-nav-link">
                <i class="uil-code"></i>
                <span>Software Experience </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('scheduling.index')}}" class="side-nav-link">
                <i class="uil-clock"></i>
                <span>Schedulings </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('sectors.index')}}" class="side-nav-link">
                <i class="uil-building"></i>
                <span>Sectors </span>
            </a>
        </li>
    @endif
</ul>
