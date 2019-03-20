<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Providers\TranslationProvider;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->secure = 1;
        parent::__construct();
    }

    public function defaultAction()
    {
        $id = $_REQUEST['id'];
        $user = \App\User::where('id', $id)->first();
        $user->userWithFeedback();
        $feedback = \App\UserFeedback::getProfileArray($id);
        $feedback_table = $this->feedbackPaginatedAction();

        $this->cont->body = view('users/publicprofile', array(
            "user" => $user,
            "feedback" => $feedback,
            "feedback_table" => $feedback_table
        ));

        return $this->RenderView();
    }

    public function feedbackPaginatedAction()
    {
        $id = $_REQUEST['id'];
        $feedBack = \App\UserFeedback::where('id_user', $id)->orderBy('date_created', 'ASC')->get();
        $this->data = $this->decorateRow(  $feedBack );
        $this->campos[] = array(
            "name" => "icon",
            "title" => "Rating",
            "width" => 80,
            "align" => "center"
        );
        $this->campos[] = array(
            "name" => "left_by",
            "title" => "Left By",
            "width" => 280
        );
        $this->campos[] = array(
            "name" => "coment",
            "title" => "Comments",
            "width" => "auto"
        );

        return "";//return $this->createTable();
    }

    protected function decorateRow( $ds )
    {
        foreach ( $ds as $row )
        {
            switch( $row->value )
            {
                case "P":
                    $row->icon = "<i class='fas fa-smile-beam green'></i>";
                    break;
                case "N":
                    $row->icon = "<i class='fas fa-frown red'></i>";
                    break;
                case "K":
                    $row->icon = "<i class='fas fa-meh'></i>";
                    break;
                
            }
            $leftBy = \App\User::where('id', $row->id_user_sent_by)->first();
            $leftBy->userWithFeedback();

            $row->left_by = "<div class='width100'>$leftBy->str_user ($leftBy->feedback_amount)</div>";
            $row->coment = ($row->str_notes != "" ) ? $this->makeCommentSection($row) : $this->translator->get($row->value."_left");
        }

        return $ds;
    }

    protected function makeCommentSection($row)
    {
        $html = "<div class='width100'>$row->str_notes</div>";
        
        // Communication
        $html .= "<div class='row'><div class='col-6'>Communication</div><div class='col-6'>";
        for ( $i = 0; $i < (int)$row->num_communication; $i++ )
        {
            $html .= "<i class='fas fa-star yellow'></i>";
        }
        for ( $i = (int)$row->num_communication; $i < 5; $i++ )
        {
            $html .= "<i class='far fa-star lightGray'></i>";
        }
        $html .= "</div></div>";
        // Punctuality
        $html .= "<div class='row'><div class='col-6'>Punctuality</div><div class='col-6'>";
        for ( $i = 0; $i < (int)$row->num_punctuality; $i++ )
        {
            $html .= "<i class='fas fa-star yellow'></i>";
        }
        for ( $i = (int)$row->num_punctuality; $i < 5; $i++ )
        {
            $html .= "<i class='far fa-star lightGray'></i>";
        }
        $html .= "</div></div>";
        // Punctuality
        $html .= "<div class='row'><div class='col-6'>Care of Goods</div><div class='col-6'>";
        for ( $i = 0; $i < (int)$row->num_care; $i++ )
        {
            $html .= "<i class='fas fa-star yellow'></i>";
        }
        for ( $i = (int)$row->num_care; $i < 5; $i++ )
        {
            $html .= "<i class='far fa-star lightGray'></i>";
        }
        $html .= "</div></div>";
        // Punctuality
        $html .= "<div class='row'><div class='col-6'>Professionalism</div><div class='col-6'>";
        for ( $i = 0; $i < (int)$row->num_professionalism; $i++ )
        {
            $html .= "<i class='fas fa-star yellow'></i>";
        }
        for ( $i = (int)$row->num_professionalism; $i < 5; $i++ )
        {
            $html .= "<i class='far fa-star lightGray'></i>";
        }
        $html .= "</div></div>";

        return $html;
    }
}
