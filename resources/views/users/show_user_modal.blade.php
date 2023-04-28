<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_user_modal_{{$user->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-full-width">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">User Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <a href="{{route('users.show',[$user->id])}}}" target="_blank" class="btn btn-primary"><i
                    class="uil-file-download"></i> Download Profile</a>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Name :</th>
                        <td>{{$user->name}}</td>
                        <th>Surname</th>
                        <td>{{$user->surname}}</td>
                        <th>Sapro Email :</th>
                        <td>{{$user->email}}</td>
                        <th>Personal Email :</th>
                        <td>{{$user->saproEmail}}</td>
                    </tr>
                    <tr>
                        <th>Sapro ID :</th>
                        <td>{{$user->saproId}}</td>
                        <th>User Role :</th>
                        <td>{{$user->type}}</td>
                        <th>Nationality</th>
                        <td>{{$user->nationality}}</td>
                        <th>Location</th>
                        <td>{{$user->location}}</td>
                    </tr>
                    <tr>
                        <th>Seniority Level</th>
                        <td>{{$user->seniorityLevel->seniorityLevelDescription??""}}</td>
                        <th>Specialisation</th>
                        <td>{{$user->specialisation->specialisationDescription??""}}</td>
                        <th>Contract Status</th>
                        <td>{{$user->contractStatus->contractStatusDescription??""}}</td>
                        <th>Highest Qualification</th>
                        <td>{{$user->highestQualification}}</td>
                    </tr>
                    <tr>
                        <th>Sapro Contract Start Date</th>
                        <td>{{$user->saproContractStartDate}}</td>
                        <th>Sapro Contract End Date</th>
                        <td>{{$user->saproContractEndDate}}</td>
                        <th>Article Firm</th>
                        <td>{{$user->articleFirm}}</td>
                        <th>Travel</th>
                        <td>{{$user->travel}}</td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Certifications</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Institute</th>
                                        <th>Certification</th>
                                        <th>Year</th>
                                    </tr>
                                    @foreach($user->certificationsAndEducation as $certification)
                                        <tr>
                                            <td>{{$certification->institute}}</td>
                                            <td>{{$certification->certificationsAndEducation}}</td>
                                            <td>{{$certification->year}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Achievements</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Achievement</th>
                                        <th>Year</th>
                                    </tr>
                                    @foreach($user->achievements as $achievement)
                                        <tr>
                                            <td>{{$achievement->achievement}}</td>
                                            <td>{{$achievement->year}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Professional Experience</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Professional Experience</th>
                                    </tr>
                                    @foreach($user->professionalExperience as $profExp)
                                        <tr>
                                            <td>{{$profExp->professionalExperience}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Firm Experience</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Company</th>
                                        <th>Country</th>
                                        <th>Level</th>
                                        <th>Start Period</th>
                                        <th>End Period</th>
                                    </tr>
                                    @foreach($user->firmExperiences as $firmExp)
                                        <tr>
                                            <td>{{$firmExp->company}}</td>
                                            <td>{{$firmExp->country}}</td>
                                            <td>{{$firmExp->level}}</td>
                                            <td>{{$firmExp->startPeriod}}</td>
                                            <td>{{$firmExp->endPeriod}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">International Experience</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Sector</th>
                                        <th>Start Period</th>
                                        <th>End Period</th>
                                    </tr>
                                    @foreach($user->internationalExperiences as $interExp)
                                        <tr>
                                            <td>{{$interExp->country}}</td>
                                            <td>{{$interExp->city}}</td>
                                            <td>{{$interExp->sector}}</td>
                                            <td>{{$interExp->startPeriod}}</td>
                                            <td>{{$interExp->endPeriod}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Software Experience</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Level</th>
                                        <th>Experience</th>
                                    </tr>
                                    @foreach($user->softwareExperiences as $softExp)
                                        <tr>
                                            <td>{{$softExp->level}}</td>
                                            <td>{{$softExp->softwareExperience}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Additional Experience</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Experience</th>
                                    </tr>
                                    @foreach($user->additionalExperiences as $addExp)
                                        <tr>
                                            <td>{{$addExp->additionalExperience}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Host Firms</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Host Firm Code</th>
                                        <th>Host Firm Name</th>
                                    </tr>
                                    @foreach($user->hostFirms as $hostFirm)
                                        <tr>
                                            <td>{{$hostFirm->hostFirmCode}}</td>
                                            <td>{{$hostFirm->hostFirmName}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">First Time Audit Clients</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Client</th>
                                        <th>Sector</th>
                                    </tr>
                                    @foreach($user->firstTimeAuditClients as $ftac)
                                        <tr>
                                            <td>{{$ftac->firstTimeAuditClient}}</td>
                                            <td>{{$ftac->sector}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Client Revenue</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Main Client</th>
                                        <th>Revenue</th>
                                        <th>Sector</th>
                                        <th>Time On Client</th>
                                        <th>Audit Work Performed</th>
                                    </tr>
                                    @foreach($user->clientRevenues as $rev)
                                        <tr>
                                            <td>{{$rev->mainClient}}</td>
                                            <td>{{"$ ".number_format($rev->revenue,'2','.',',')}}</td>
                                            <td>{{$rev->sector}}</td>
                                            <td>{{$rev->timeOnClient}}</td>
                                            <td>
                                                @if($rev->auditedWork)
                                                    <ol>
                                                        @foreach($rev->auditedWork as $work)
                                                            <li>{{$work->auditWorkPerformed}}</li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Industries</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Industry</th>
                                    </tr>
                                    @foreach($user->industries as $industry)
                                        <tr>
                                            <td>{{$industry->industry}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Listed Clients</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Client</th>
                                        <th>Sector</th>
                                    </tr>
                                    @foreach($user->listedClients as $listed)
                                        <tr>
                                            <td>{{$listed->listedClient}}</td>
                                            <td>{{$listed->sector}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Sectors</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Sector</th>
                                        <th>Sector Category</th>
                                    </tr>
                                    @foreach($user->sectors as $sector)
                                        <tr>
                                            <td>{{$sector->sector}}</td>
                                            <td>{{$sector->sectorCategory}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-primary">
                                <p class="modal-title">Scheduling</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Bs Host Firm Code</th>
                                        <th>Bs Start Date</th>
                                        <th>Bs End Date</th>
                                        <th>Post Bs Host Firm Code</th>
                                        <th>Post Bs Host Start Date</th>
                                        <th>Post Bs Host End Date</th>
                                        <th>Year</th>
                                    </tr>
                                    @foreach($user->scheduling as $sched)
                                        <tr>
                                            <td>{{$sched->bsHostFirmCode}}</td>
                                            <td>{{$sched->bsStartDate}}</td>
                                            <td>{{$sched->bsEndDate}}</td>
                                            <td>{{$sched->postBsHostFirmCode}}</td>
                                            <td>{{$sched->postBsStartDate}}</td>
                                            <td>{{$sched->postBsEndDate}}</td>
                                            <td>{{$sched->year}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


