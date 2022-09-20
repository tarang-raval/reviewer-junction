@extends('layouts.adminMaster')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">


                    <form id="settingform" method="post" action="{{route('admin.setting.store')}}">
                        @csrf

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">{{ (isset($setting) && !empty($setting))?'Edit':'Add'}} Setting</h3>
                            <div>
                                <button type="submit" class="btn btn-primary">{{ (isset($setting) && !empty($setting))?'Update':'Save'}}</button>
                            <a href="{{route('admin.setting.index')}}" class="btn btn-default">cancel</a>
                            </div>
                        </div>

                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="" class="col-sm-4 col-form-label">No. of Review Per Day</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="number_of_review_per_day" id="number_of_review_per_day"  placeholder="Ex: 1" value="{{ (isset($setting) && !empty($setting) && isset($setting->number_of_review_per_day))?$setting->number_of_review_per_day:old('number_of_review_per_day')}}" min="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label for="" class="col-sm-4 col-form-label">No. of Review Show As Guest</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="no_of_review_show_as_guest" id="no_of_review_show_as_guest"  placeholder="Ex.: 2" value="{{ (isset($setting) && !empty($setting) && isset($setting->no_of_review_show_as_guest))?$setting->no_of_review_show_as_guest:old('no_of_review_show_as_guest')}}" min="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label for="" class="col-sm-4 col-form-label">1 point = (?) money</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="one_points_equal_money" id="one_points_equal_money"  placeholder="Ex. 00.00" value="{{ (isset($setting) && !empty($setting) && isset($setting->one_points_equal_money))?$setting->one_points_equal_money:old('one_points_equal_money')}}" min="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label for="" class="col-sm-4 col-form-label">No. Of Days Required to redeem Points</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="no_of_days_account_redeem_points" id="no_of_days_account_redeem_points"  placeholder="Ex. 2" value="{{ (isset($setting) && !empty($setting) && isset($setting->no_of_days_account_redeem_points))?$setting->no_of_days_account_redeem_points:old('no_of_days_account_redeem_points')}}" min="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label for="" class="col-sm-4 col-form-label">Min. Points Required To Redeem</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="minimum_points_required_to_redeem" id="minimum_points_required_to_redeem"  placeholder="Ex. 100" value="{{ (isset($setting) && !empty($setting) && isset($setting->minimum_points_required_to_redeem))?$setting->minimum_points_required_to_redeem:old('minimum_points_required_to_redeem')}}" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ (isset($setting) && !empty($setting))?'Update':'Save'}}</button>
                            <a href="{{route('admin.setting.index')}}" class="btn btn-default">cancel</a>
                        </div>
                    </form>

            </div>
        </div>
    </div>
@endsection
@push('js')
        <script>

            $('#settingform').validate({
                rules: {
                    number_of_review_per_day: {required: true,number: true},
                    no_of_review_show_as_guest: {required: true,number: true},
                    one_points_equal_money: {required: true,number: true},
                    no_of_days_account_redeem_points: {required: true,number: true},
                    minimum_points_required_to_redeem: {required: true,number: true},
                },

                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                     $(element).removeClass('is-invalid');
                }
            });
        </script>
@endpush


