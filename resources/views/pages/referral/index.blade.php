@extends('layouts.user', ['title' => 'Getting invitation link'])
@section('css')

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.13/clipboard.min.js"></script>
    <script>
        new Clipboard('.btn');
    </script>
@endsection

@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <h1 class="display-heading text-center">Share your link</h1>
            <p class="display-description text-center">Invite your friends to join and invest with us, and for each one  who register under your invitation code,  we’ll give you <b>RM 20</b>. </p>
            <div class="row">
                <!--Condensed Table-->
                <div class="col-sm-6">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">Hover &amp; Image
                            <div class="tools"><span class="icon mdi mdi-download"></span><span
                                        class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th style="width:37%;">User</th>
                                    <th style="width:36%;">Commit</th>
                                    <th>Date</th>
                                    <th class="actions"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="user-avatar"><img src="assets/img/avatar6.png" alt="Avatar">Penelope
                                        Thornton
                                    </td>
                                    <td>Initial commit</td>
                                    <td>Aug 6, 2015</td>
                                    <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="user-avatar"><img src="assets/img/avatar4.png" alt="Avatar">Benji Harper
                                    </td>
                                    <td>Main structure markup</td>
                                    <td>Jul 28, 2015</td>
                                    <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="user-avatar"><img src="assets/img/avatar5.png" alt="Avatar">Justine
                                        Myranda
                                    </td>
                                    <td>Left sidebar adjusments</td>
                                    <td>Jul 15, 2015</td>
                                    <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="user-avatar"><img src="assets/img/avatar3.png" alt="Avatar">Sherwood
                                        Clifford
                                    </td>
                                    <td>Topbar dropdown style</td>
                                    <td>Jun 30, 2015</td>
                                    <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="user-info-list panel panel-default">
                        <div class="panel-heading panel-heading-divider">About Me<span class="panel-subtitle">About you</span>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="input-group xs-mb-15">
                                    <input id="copy-the-fucking-link" readonly="readonly" type="text" value="{{ url('/') . '/ref/' . Auth::user()->invite_code }}"  class="form-control"><span class="input-group-btn">
                                    <button type="button" class="btn btn-success" data-clipboard-target="#copy-the-fucking-link">Copy link</button></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
