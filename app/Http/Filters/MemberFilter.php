<?php
namespace App\Http\Filters;

use App\Http\Filters\Filter;
use Illuminate\Http\Request;

class MemberFilter extends Filter
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function search($value = '') {
        return $this->searchModel($value, function ($query, $fields, $keyword) {
            foreach ($fields as $field) {
                $query->orWhere($field, 'like', '%'.$keyword.'%');
            }

            $query->orWhereHas('premium', function ($q) use ($keyword){
                $q->where('number', 'LIKE', '%'. $keyword .'%')
                  ->orWhere('code', 'LIKE', '%'. $keyword .'%');
            });
          });
    }
}
