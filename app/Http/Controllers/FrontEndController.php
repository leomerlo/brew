<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\RecordType;
//use App\Models\Config;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

  public function index() {

    $record = Record::where('slug','homepage')->first();

		$fields = [];
    foreach ($record->AllFieldsWithValues as $field) {
      $fields[$field['name']] = $field['value'];
    }

		$type_slug = $record->rel_record_type->slug;

		return view('records.view', [ 'type_slug' => $type_slug, 'record' => $record, 'fields' => $fields ]);

  }

  public function view($slug){

		$record = Record::where('slug',$slug)->first();

    if($record){

      $fields = [];
      foreach ($record->AllFieldsWithValues as $field) {
        $fields[$field['name']] = $field['value'];
      }

      $type_slug = $record->rel_record_type->slug;

      return view('records.view', [ 'type_slug' => $type_slug, 'record' => $record, 'fields' => $fields ]);

    } else {

      $recordType = RecordType::where('slug',$slug)->first();

      $fields = [];
      foreach($recordType->records as $record){
        foreach ($record->AllFieldsWithValues as $field) {
          $fields[$record->id][$field['name']] = $field['value'];
        }
      }

      return view('recordType.view', [ 'type' => $recordType, 'fields' => $fields ]);

    }

	}

}
