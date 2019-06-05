@inject('translator', 'App\Providers\TranslationProvider')
<link rel="stylesheet" href="{{ asset('/css/tooltipster.bundle.min.css') }}">
<script src="{{ asset('/js/tooltipster.bundle.min.js') }}"></script>
<script>
    $(document).ready( function() {
        $('[tooltip]').tooltipster();
    });
</script>
<div class="container-fluid">
    <div class="listing">
        <div class="listing-nav">
        </div>
        <div class="row">
            <div class="card width100">
                <div class="card-header">
                    {{ $courier->str_user }} ({{ $courier->feedback_amount}})
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 md-inline-flex sm-block" style="">
                            <div style="min-width: 150px; margin: 0 15px 0 0; text-align: center; height: fit-content; position: relative;">
                                @if ( $userStatus['status'] == "online" )
                                <div style="height: 13px; width: 100%; font-size: 13px;line-height: 13px; background-color: rgba(255,255,255,0.8); position: absolute; left: 0; bottom: 10px;">Online <span style="float: right; height: 13px; width: 13px; background-color: green; border-radius: 50%;"></span>
                                </div>
                                @else
                                <div data-tooltip-content="#status_tooltip" tooltip style="height: 13px; width: 13px; border-radius: 50%; background-color: grey; position: absolute; right: 10px; bottom: 10px;"></div>
                                @endif
                                <img src="archivos/img/avatar.png" style="max-width: 128px; max-height: 128px; border-radius: 50%;">
                            </div>
                            <div class="public-profile">
                                <div class="row">
                                    <div class="col-8">
                                        Feedback score:
                                    </div>
                                    <div class="col-4">
                                        {{ $courier->feedback_score }}
                                    </div>
                                    <div class="col-8">
                                        Completed jobs:
                                    </div>
                                    <div class="col-4">
                                        {{ $courier->completed_jobs }}
                                    </div>
                                    <div class="col-8">
                                        Registered since:
                                    </div>
                                    <div class="col-4">
                                        {{ date('d/m/Y', strtotime($courier->date_created)) }}
                                    </div>
                                    <div class="col-8">
                                        Drivers:
                                    </div>
                                    <div class="col-4">
                                        {{ $courier->num_drivers }}
                                    </div>
                                    <div class="col-8">
                                        Vehicles:
                                    </div>
                                    <div class="col-4">
                                        {{ $courier->num_vehicles }}
                                    </div>
                                    <div class="col-8">
                                        GIT (Goods In Transit) insurance:
                                    </div>
                                    <div class="col-4">
                                        @if ( (int)$courier->bln_git === 1 )
                                        <i class="fas fa-check green"></i> <i data-tooltip-content="#git_tooltip" class="fas fa-question-circle purple pointer" tooltip></i>
                                        @else
                                        <i class="fas fa-times red"></i>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        CMR (Carriage of Goods by Road) insurance:
                                    </div>
                                    <div class="col-4">
                                        @if ( (int)$courier->bln_cmr === 1 )
                                        <i class="fas fa-check green"></i> <i data-tooltip-content="#cmr_tooltip" class="fas fa-question-circle purple pointer" tooltip></i>
                                        @else
                                        <i class="fas fa-times red"></i>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        Regions
                                    </div>
                                    <div class="col-8">
                                        {{ $courier->regions }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <h5><i class="fas fa-chart-line"></i> Feedback summary</h5>
                            <table class="width100 lightTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            1 month
                                        </th>
                                        <th>
                                            6 months
                                        </th>
                                        <th>
                                            1 year
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="green">
                                        <td>
                                            <i class="fas fa-smile-beam"></i> Positive
                                        </td>
                                        <td>
                                            {{ $feedback->positive_month }}
                                        </td>
                                        <td>
                                            {{ $feedback->positive_sixmonth }}
                                        </td>
                                        <td>
                                            {{ $feedback->positive_year }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-meh"></i> Neutral
                                        </td>
                                        <td>
                                            {{ $feedback->neutral_month }}
                                        </td>
                                        <td>
                                            {{ $feedback->neutral_sixmonth }}
                                        </td>
                                        <td>
                                            {{ $feedback->neutral_year }}
                                        </td>
                                    </tr>
                                    <tr class="red">
                                        <td>
                                            <i class="fas fa-frown"></i> Negative
                                        </td>
                                        <td>
                                            {{ $feedback->negative_month }}
                                        </td>
                                        <td>
                                            {{ $feedback->negative_sixmonth }}
                                        </td>
                                        <td>
                                            {{ $feedback->negative_year }}               
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5 style="padding-top: 15px;"><i class="fas fa-star"></i> Feedback detail</h5>
                            <table class="width100">
                                <tbody>
                                    <tr>
                                        <td>
                                            Communication
                                        </td>
                                        <td>
                                            <div class="star-rating" title="70%">
                                                <div class="back-stars">
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    
                                                    <div class="front-stars" style="width: 70%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Punctuality
                                        </td>
                                        <td>
                                            <div class="star-rating" title="70%">
                                                <div class="back-stars">
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    
                                                    <div class="front-stars" style="width: 70%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Care of goods
                                        </td>
                                        <td>
                                            <div class="star-rating" title="70%">
                                                <div class="back-stars">
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    
                                                    <div class="front-stars" style="width: 70%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Professionalism
                                        </td>
                                        <td>
                                            <div class="star-rating" title="70%">
                                                <div class="back-stars">
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    
                                                    <div class="front-stars" style="width: 70%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- FEEDBACK TABLE -->
    {!! $feedback_table !!}
    </div>
</div>



<!-- Templates for tooltips for insurance -->
<div class="tooltip-templates">
    @if ( (int)$courier->bln_git === 1 )
    <table class="width100" id="git_tooltip">
        <tbody>
            <tr>
                <td>
                    Level of cover
                </td>
                <td>
                    {{ $courier->level_git }}
                </td>
            </tr>
            <tr>
                <td>
                    Insurer
                </td>
                <td>
                    {{ $courier->coment_git }}
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    
    @if ( (int)$courier->bln_cmr === 1 )
    <table class="width100" id="cmr_tooltip">
        <tbody>
            <tr>
                <td>
                    Level of cover
                </td>
                <td>
                    {{ $courier->level_cmr }}
                </td>
            </tr>
            <tr>
                <td>
                    Insurer
                </td>
                <td>
                    {{ $courier->coment_cmr }}
                </td>
            </tr>
        </tbody>
    </table>
    @endif

    <table class="width100" id="status_tooltip">
        <tbody>
            <tr>
                <td>
                    @if( $userStatus['status'] != "online" )
                        {{ $userStatus['message'] }}
                    @else
                        {{ $userStatus['status'] }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>