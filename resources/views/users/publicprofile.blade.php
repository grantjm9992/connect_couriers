@inject('translator', 'App\Providers\TranslationProvider')

<div class="container-fluid">
    <div class="listing">
        <div class="listing-nav">
        </div>
        <div class="row">
            <div class="card width100">
                <div class="card-header">
                    {{ $user->str_user }} ({{ $user->feedback_amount}})
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
                                <img src="archivos/img/avatar.png" noopen style="max-width: 128px; max-height: 128px; border-radius: 50%;">
                            </div>
                            <div class="public-profile">
                                <div class="row">
                                    <div class="col-8">
                                        Feedback score:
                                    </div>
                                    <div class="col-4">
                                        {{ $user->feedback_score }}
                                    </div>
                                    <div class="col-8">
                                        Registered since:
                                    </div>
                                    <div class="col-4">
                                        {{ date('d/m/Y', strtotime($user->date_created)) }}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- FEEDBACK TABLE -->
    {!! $feedback_table !!}
    </div>
    <div class="container-fluid">
        {!! $listings !!}
    </div>
</div>



<!-- Templates for tooltips for insurance -->
<div class="tooltip-templates">

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