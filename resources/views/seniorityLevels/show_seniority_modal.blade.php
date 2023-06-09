<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_seniority_modal_{{$level->seniorityLevelId}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Seniority Level Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Seniority Level ID :</th>
                        <td>{{$level->seniorityLevelId}}</td>
                    </tr>
                    <tr>
                        <th>Seniority Level Code :</th>
                        <td>{{$level->seniorityLevelCode}}</td>
                    </tr>
                    <tr>
                        <th>Seniority Level Description :</th>
                        <td>{{$level->seniorityLevelDescription}}</td>
                    </tr>
                </table>

                @if(count($level->competences))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card table-responsive">
                                <div class="card-header modal-colored-header bg-info">
                                    <p class="modal-title">Competences <span
                                            class="float-end">Total:  {{count($level->competences)}}</span>
                                    </p>
                                </div>
                                <div class="card-body">


                                    <table class="table table-sm table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Competence</th>
                                        </tr>
                                        @foreach($level->competences as $competence)
                                            <tr>
                                                <td>{{++$loop->index}}</td>
                                                <td>{{$competence->competenceLevel}}</td>
                                            </tr>
                                        @endforeach
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


