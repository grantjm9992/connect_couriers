@inject('translator', 'App\Providers\TranslationProvider')
<style>

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }
  
  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #454545;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #86fc8e;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #86fc8e;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }
  .other-check {
      display: none;
  }
  .git-check {
      display: none;
  }
  .cmr-check {
      display: none;
  }
  @media screen and ( max-width: 786px )
    {
    .small-vertical {
        padding: 15px 0;
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: column!important;
        flex-direction: column!important;
    }
  }
</style>
<div class="container-fluid" style="padding: 40px 15px; max-width: 1100px; margin: 0 auto;">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
            <div class="list-group">
                <a href="MyAccount" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Summary</a>
                <a href="MyQuotes.myActiveQuotes" class="list-group-item list-group-item-action"><i class="fas fa-box-open"></i> Active Quotes</a>
                <a href="MyQuotes.myOutbidQuotes" class="list-group-item list-group-item-action"><i class="fas fa-thumbs-down"></i> Outbid Quotes</a>
                <a href="Watching" class="list-group-item list-group-item-action"><i class="fas fa-eye"></i> Listings I'm watching</a>
                <a href="MyQuotes.myAcceptedQuotes" class="list-group-item list-group-item-action"><i class="fas fa-check-circle"></i> Accepted Quotes</a>
                <a href="MyQuotes.myUnsuccessfulQuotes" class="list-group-item list-group-item-action"><i class="fas fa-times-circle"></i> Unsuccessful Quotes</a>
                <a href="MyQuotes.myCompletedQuotes" class="list-group-item list-group-item-action"><i class="fas fa-handshake"></i> Completed Quotes</a>
                <a href="Messages" class="list-group-item list-group-item-action"><i class="fas fa-envelope"></i> Messages</a>
                <a href="MyAccount.detail" class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Account</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-md-8 col-lg-9 col-xl-9 account-list">
            <form id="form" action="MyAccount.editCourier">
                @csrf()
                <h4>
                    <i class="fas fa-user-circle"></i> My account
                    <div class="buttons">
                        <div onclick="submitForm()" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save
                        </div>
                    </div>            
                </h4>
                <ul class="nav nav-pills mb-3 small-vertical" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="true"><i class="fas fa-user"></i> Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-truck"></i> Courier profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-insurance-tab" data-toggle="pill" href="#pills-insurance" role="tab" aria-controls="pills-insurance" aria-selected="false"><i class="fas fa-boxes"></i> Insurance</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="str_name">Name</label>
                                <input type="text" class="form-control" name="str_name" value="{{ $courier->str_name }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="str_surname">Surname</label>
                                <input type="text" class="form-control" name="str_surname" value="{{ $courier->str_surname }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="str_email">Email</label>
                                <input type="email" class="form-control" name="str_email" value="{{ $courier->str_email }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="num_phone">Phone</label>
                                <input type="text" class="form-control" name="num_phone" value="{{ $courier->num_phone }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="str_password">Password</label>
                                <input type="password" class="form-control" name="str_password">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="str_password2">Confirm password</label>
                                <input type="password" class="form-control" name="str_password2">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="str_name">Courier type</label>
                                <select name="id_transportista_type" id="id_transportista_type" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach ( $courierTypes as $type )
                                    <option value="{{ $type->id }}">{{ $type->str_description }}</option>
                                    @endforeach
                                </select>
                                <script>
                                    $('#id_transportista_type').val('{{ $courier->id_transportista_type }}');
                                </script>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="str_surname">Company type</label>
                                <select name="id_company_type" id="id_company_type" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach ( $companyTypes as $type )
                                    <option value="{{ $type->id }}">{{ $type->str_description }}</option>
                                    @endforeach
                                </select>
                                <script>
                                    $('#id_company_type').val('{{ $courier->id_company_type }}');
                                </script>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="num_employees">Nº employees</label>
                                <input min="1" type="number" class="form-control" name="num_employees" value="{{ $courier->num_employees }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="num_drivers">Nº drivers</label>
                                <input min="1" type="number" class="form-control" name="num_drivers" value="{{ $courier->num_drivers }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="num_vehicles">Nº vehicles</label>
                                <input min="1" type="number" class="form-control" name="num_vehicles" value="{{ $courier->num_vehicles }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="year_established">Year established</label>
                                <input min="1900" type="number" class="form-control" name="year_established" value="{{ $courier->year_established }}">
                            </div>
                            <h5 class="width100">Operating regions</h5>
                            @foreach ( $regions as $region )
                                <div class="form-group col-12 col-md-6">
                                    <label class="switch">
                                        <input type="checkbox" class="region_check" region="{{ $region->id }}" id="region_{{ $region->id }}">
                                        <span class="slider round"></span>
                                    </label>
                                    <label for="region_{{ $region->id }}">{{ $region->str_description }}</label>
                                </div>
                            @endforeach
                            <input type="text" name="regions" id="regions" value="{{ $courier->regions }}" hidden>
                            <h5 class="width100">Categories</h5>
                            @foreach ( $categories as $region )
                                <div class="form-group col-12 col-md-6">
                                    <label class="switch">
                                        <input type="checkbox" class="category_check" category="{{ $region->id_category }}" id="category_{{ $region->id_category }}">
                                        <span class="slider round"></span>
                                    </label>
                                    <label for="category_{{ $region->id_category }}">{{ $region->str_category }}</label>
                                </div>
                            @endforeach
                            <input type="text" name="categories" id="categories" value="{{ $courier->categories }}" hidden>
                            <h5 class="width100">Payment methods</h5>
                            @foreach ( $paymentMethods as $region )
                            <div class="form-group col-12 col-md-6">
                                    <label class="switch">
                                        <input type="checkbox" class="pm_check" pm="{{ $region->id }}" id="pm_{{ $region->id }}">
                                        <span class="slider round"></span>
                                    </label>
                                    <label for="pm_{{ $region->id }}">{{ $region->str_description }}</label>
                                </div>
                            @endforeach
                            <input type="text" name="payment_types" id="payment_types" value="{{ $courier->payment_types }}" hidden>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-insurance" role="tabpanel" aria-labelledby="pills-insurance-tab">
                        <div class="row">
                            <h5 class="width100">
                                <label class="switch">
                                    <input type="checkbox" id="git_check">
                                    <span class="slider round"></span>
                                </label>
                                GIT (Goods In Transit) insurance 
                            </h5>
                            <div class="form-group col-12 col-md-6 git-check">
                                <label for="level_git">Level of cover</label>
                                <input type="number" name="level_git" value="{{ $courier->level_git }}" class="form-control">
                            </div>
                            <div class="form-group col-12 col-md-6 git-check">
                                <label for="coment_git">Insurance company</label>                            
                                <input type="text" name="coment_git" value="{{ $courier->coment_git }}" class="form-control">
                            </div>
                            <!-- -->
                            <h5 class="width100">
                                <label class="switch">
                                    <input type="checkbox" id="cmr_check">
                                    <span class="slider round"></span>
                                </label>
                                CMR (Carriage of Goods by Road) Insurance
                            </h5>
                            <div class="form-group col-12 col-md-6 cmr-check">
                                <label for="level_cmr">Level of cover</label>
                                <input type="number" name="level_cmr" value="{{ $courier->level_cmr }}" class="form-control">
                            </div>
                            <div class="form-group col-12 col-md-6 cmr-check">
                                <label for="coment_cmr">Insurance company</label>                            
                                <input type="text" name="coment_cmr" value="{{ $courier->coment_cmr }}" class="form-control">
                            </div>
                            <!-- -->
                            <h5 class="width100">
                                <label class="switch">
                                    <input type="checkbox" id="other_check">
                                    <span class="slider round"></span>
                                </label>
                                Other Insurance
                            </h5>
                            <div class="form-group col-12 col-md-6 other-check">
                                <label for="level_other">Level of cover</label>
                                <input type="number" name="level_other" value="{{ $courier->level_other }}" class="form-control">
                            </div>
                            <div class="form-group col-12 col-md-6 other-check">
                                <label for="coment_other">Insurance company</label>                            
                                <input type="text" name="coment_other" value="{{ $courier->coment_other }}" class="form-control">
                            </div>
                            <input type="text" value="{{ $courier->bln_git }}" name="bln_git" hidden>
                            <input type="text" value="{{ $courier->bln_other }}" name="bln_other" hidden>
                            <input type="text" value="{{ $courier->bln_cmr }}" name="bln_cmr" hidden>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var isOkay = 0;
    function submitForm()
    {
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
        if ( $('[name="str_password"]').val() != $('[name="str_password2"]').val() )
        {
            var options = new Array();
            options.title = "Error";
            options.text = "Passwords do not match";
            options.icon = "error";
            alert(options);
            $('[name="str_password"]').focus();
        }
        else if ( !strongRegex.test( $('[name="str_password"]').val() ) && $('[name="str_password"]').val() != "" )
        {

            var options = new Array();
            options.title = "Error";
            options.text = "Password must contain an uppercase and lowercase letter, number and be at least 8 characters";
            options.icon = "warning";
            alert(options);
        } 
        else
        {
            $('#form').submit();
        }
    }

    $('.region_check').change( function() {
        $('#regions').val('');
        var checks = $('.region_check');
        var val = "";
        for ( var i = 0; i < checks.length; i++ )
        {
            if ( $(checks[i]).is(':checked') )
            {
                val += $(checks[i]).attr('region')+"@#";
            }
        }
        $('#regions').val(val);
    });
    $('.category_check').change( function() {
        $('#categories').val('');
        var checks = $('.category_check');
        var val = "";
        for ( var i = 0; i < checks.length; i++ )
        {
            if ( $(checks[i]).is(':checked') )
            {
                val += $(checks[i]).attr('category')+"@#";
            }
        }
        $('#categories').val(val);
    });
    $('.pm_check').change( function() {
        $('#payment_types').val('');
        var checks = $('.pm_check');
        var val = "";
        for ( var i = 0; i < checks.length; i++ )
        {
            if ( $(checks[i]).is(':checked') )
            {
                val += $(checks[i]).attr('pm')+"@#";
            }
        }
        $('#payment_types').val(val);
    });
    
    $(document).ready( function() {
    });

    $(document).ready( function() {
        {!! $onLoadJS !!}
        $('#other_check').change( function() {
            if ( $(this).is(':checked') )
            {
                $('.other-check').show(500);
                $('[name="bln_other"]').val(1);
            }
            else
            {
                $('.other-check').hide();
                $('.other-check > input').val('');
                $('[name="bln_other"]').val(0);
            }
        });
        $('#cmr_check').change( function() {
            if ( $(this).is(':checked') )
            {
                $('.cmr-check').show(500);
                $('[name="bln_cmr"]').val(1);
            }
            else
            {
                $('.cmr-check').hide();
                $('.cmr-check > input').val('');
                $('[name="bln_cmr"]').val(0);
            }
        });
        $('#git_check').change( function() {
            if ( $(this).is(':checked') )
            {
                $('.git-check').show(500);
                $('[name="bln_git"]').val(1);
            }
            else
            {
                $('.git-check').hide();
                $('.git-check > input').val('');
                $('[name="bln_git"]').val(0);
            }
        })
    })

</script>