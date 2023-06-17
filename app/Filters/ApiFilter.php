<?php
namespace App\Filters;
use Illuminate\Http\Request;

class  ApiFilter{


    public $safeParms =[

    ];

    public $columnMaps =[

    ];
    public $operatorMap=[

    ];
    public function transform(Request $request){
        $eloQuery = [];
        foreach ($this->safeParms as $parm=>$operator)
        {
          $query = $request->query($parm);
          if (!isset($query)){
              continue;
          }
          //return  $query;
          $colunm = $this->columnMaps[$parm] ?? $parm;

          foreach ($operator as $s ){
            if (isset($query[$s])){
              $eloQuery [] = [$colunm , $this-> $operatorMap[$s],$query[$s]];
             }
          }
        }

        return $eloQuery;
    }

}
