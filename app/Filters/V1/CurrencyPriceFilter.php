<?php

namespace App\Filters\V1;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CurrencypriceFilter {


    protected $safeParms =[
        'currency_id' => ['eq'],
        'today_price'=> ['eq','gt','lt'],
        'yesterday_price'=> ['eq','gt','lt'],
        'percentage'=> ['eq'],
        'Date_Time' =>  ['eq','gt','lt'],

    ];

    protected $columnMaps =[
        'today_price' => 'today_price',
        'Date_Time' => 'Date_Time',
        'yesterday_price'=> 'yesterday_price'
    ];
    protected $operatorMap =[
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
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
