<?php

namespace App\Filters\V1;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CurrencyFilter {


    protected $safeParms =[
        'logo'=> ['eq'],
        'Currency_name'=> ['eq'],
        'Abbrevation'=> ['eq'],

    ];
    protected $columnMaps =[
        'Currency_name' => 'Currency_name'
    ];
    protected $operatorMap =[
     'eq' => '=',
    ];
    public function transform(Request $request){
        $eloQuery = [];

        foreach ($this->safeParms as $parm=>$operators)
        {
          $query = $request->query($parm);
          if (!isset($query)){
              continue;
          }
          //return  $query;
          $colunm = $this->columnMaps[$parm] ?? $parm;

          foreach ($operators as $operator ){
            if (isset($query[$operator])){
              $eloQuery[] = [$colunm ,$this->$operatorMap[$operator],$query[$operator]];
             }
          }
        }
        return $eloQuery;
    }


}


