<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsumerData;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        
        $userData = ConsumerData::whereHas('products', function ($query) {
            $query->whereIn('category_id', function ($query) {
                $query->select('product_category_id')
                ->from('company_product_category')
                ->where('company_id', auth()->user()->company_id);
            });
        });
        
        $userDataOriginal = clone $userData;

        // Gender filter
        if (request()->filled('gender')) {
            $userData->where('gender', request()->gender);
        }
        
        // Age filter
        if (request()->filled('age')) {
            $age = explode('-', request()->age);
            $userData->whereBetween('age', [$age[0], $age[1]]);
        }
        
       // Income filter
       if (request()->filled('income')) {
            $income = request()->income;
            if (strpos($income, '+') !== false) {
                $minIncome = str_replace('k', '001', str_replace('+', '', $income));
                $userData->where('income', '>', $minIncome);
            } else {
                $income = explode('-', $income);
                $minIncome = str_replace('k', '001', $income[0]);
                $maxIncome = str_replace('k', '000', $income[1]);
                $userData->whereBetween('income', [$minIncome, $maxIncome]);
            }
        }
        
        // Cities filter
        if (request()->filled('city')) {
            $userData->where('city', request()->city);
        }

        // Dependants filter
        if (request()->filled('number_of_dependants')) {
            $userData->where('number_of_dependants', request()->number_of_dependants);
        }
        
        // Dietary requirements filter
        if (request()->filled('dietary_requirements')) {
            $dietaryReq = request() ->dietary_requirements;
            if ($dietaryReq == 'No restrictions') {
                $dietaryReq = '';
            }
            $userData->where('dietary_requirements', $dietaryReq);
        }
        
    
        // Get all data after applying filters
        $userData = $userData->get();
        $userDataOriginal = $userDataOriginal->get();

        // gender graph
        $genderData = [
            'Male' => $userData->where('gender', 'Male')->count(),
            'Female' => $userData->where('gender', 'Female')->count(),
        ];
        $genderDataOriginal = [
            'Male' => $userDataOriginal->where('gender', 'Male')->count(),
            'Female' => $userDataOriginal->where('gender', 'Female')->count(),
        ];

        // Age graph
        $ageData = [        
            '15-24' => $userData->whereBetween('age', [15, 24])->count(),
            '25-34' => $userData->whereBetween('age', [25, 34])->count(),
            '35-44' => $userData->whereBetween('age', [35, 44])->count(),
            '45-54' => $userData->whereBetween('age', [45, 54])->count(),
            '55-64' => $userData->whereBetween('age', [55, 64])->count(),
            '65-74' => $userData->whereBetween('age', [65, 74])->count(),
            '75+' => $userData->where('age', '>', 75)->count(),
        ];
        $ageDataOriginal = [        
            '15-24' => $userDataOriginal->whereBetween('age', [15, 24])->count(),
            '25-34' => $userDataOriginal->whereBetween('age', [25, 34])->count(),
            '35-44' => $userDataOriginal->whereBetween('age', [35, 44])->count(),
            '45-54' => $userDataOriginal->whereBetween('age', [45, 54])->count(),
            '55-64' => $userDataOriginal->whereBetween('age', [55, 64])->count(),
            '65-74' => $userDataOriginal->whereBetween('age', [65, 74])->count(),
            '75+' => $userDataOriginal->where('age', '>', 75)->count(),
        ];

        
        // cites
        $citiesData = $userData->groupBy('city')->map->count()->sortDesc()->slice(0, 5);
        $citiesDataOriginal = $userDataOriginal->groupBy('city')->map->count()->sortKeys();

        // income
        $incomeData = [
            '10-25k' => $userData->whereBetween('income', [10000, 25000])->count(),
            '25k-35k' => $userData->whereBetween('income', [25001, 35000])->count(),
            '35k-45k' => $userData->whereBetween('income', [35001, 45000])->count(),
            '45k-65k' => $userData->whereBetween('income', [45001, 65000])->count(),
            '65k-80k' => $userData->whereBetween('income', [65001, 80000])->count(),
            '80k-120k' => $userData->whereBetween('income', [80001, 120000])->count(),
            '120k+' => $userData->whereBetween('income', [120001, 500000])->count(),
        ];
        $incomeDataOriginal = [
            '10-25k' => $userDataOriginal->whereBetween('income', [10000, 25000])->count(),
            '25k-35k' => $userDataOriginal->whereBetween('income', [25001, 35000])->count(),
            '35k-45k' => $userDataOriginal->whereBetween('income', [35001, 45000])->count(),
            '45k-65k' => $userDataOriginal->whereBetween('income', [45001, 65000])->count(),
            '65k-80k' => $userDataOriginal->whereBetween('income', [65001, 80000])->count(),
            '80k-120k' => $userDataOriginal->whereBetween('income', [80001, 120000])->count(),
            '120k+' => $userDataOriginal->whereBetween('income', [120001, 500000])->count(),
        ];
    
        // number of dependants 
        $numOfDependantsData = $userData->groupBy('number_of_dependants')->sortKeys()->map->count();
        $numOfDependantsDataOriginal = $userDataOriginal->groupBy('number_of_dependants')->sortKeys()->map->count();
        
        // dietary requirements
        $dietaryData = $userData->groupBy('dietary_requirements')->sortKeys()->map->count()->toArray(); 
        // Rename empty to 'No restrictions'
        if (isset($dietaryData[''])) {
            $count = $dietaryData[''];
            unset($dietaryData['']);
            $dietaryData['No restrictions'] = $count;
        }
        $dietaryData = collect($dietaryData);

        $dietaryDataOriginal = $userDataOriginal->groupBy('dietary_requirements')->sortKeys()->map->count()->toArray(); 
        // Rename empty to 'No restrictions'
        if (isset($dietaryDataOriginal[''])) {
            $count = $dietaryDataOriginal[''];
            unset($dietaryDataOriginal['']);
            $dietaryDataOriginal['No restrictions'] = $count;
        }
        $dietaryDataOriginal = collect($dietaryDataOriginal);
            
        return view('dashboard', [
            'genderData' => $genderData,
            'ageData' => $ageData,
            'citiesData' => $citiesData,
            'incomeData' => $incomeData,
            'numOfDependantsData' => $numOfDependantsData,
            'dietaryData' => $dietaryData,
            'genderDataOriginal' => $genderDataOriginal,
            'ageDataOriginal' => $ageDataOriginal,
            'citiesDataOriginal' => $citiesDataOriginal,
            'incomeDataOriginal' => $incomeDataOriginal,
            'numOfDependantsDataOriginal' => $numOfDependantsDataOriginal,
            'dietaryDataOriginal' => $dietaryDataOriginal,
            ]
        );
    }
}
    