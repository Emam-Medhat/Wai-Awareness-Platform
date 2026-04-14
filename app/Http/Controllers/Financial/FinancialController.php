<?php

namespace App\Http\Controllers\Financial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Article;
use App\Models\Video;
use App\Models\Book;

class FinancialController extends Controller
{
    /**
     * Display expenses overview
     */
    public function expenses(Request $request)
    {
        // Simple test response first
        return response()->json([
            'message' => 'Expenses method is working!',
            'data' => 'test data'
        ]);
        
        // Original code (commented for testing)
        /*
        // Get monthly expenses data
        $monthlyExpenses = $this->getMonthlyExpenses();
        
        // Get expense categories
        $expenseCategories = $this->getExpenseCategories();
        
        // Get recent transactions
        $recentTransactions = $this->getRecentTransactions();
        
        return view('admin.financial.expenses', compact(
            'monthlyExpenses',
            'expenseCategories',
            'recentTransactions'
        ));
        */
    }
    
    /**
     * Display revenue overview
     */
    public function revenue(Request $request)
    {
        // Get monthly revenue data
        $monthlyRevenue = $this->getMonthlyRevenue();
        
        // Get revenue sources
        $revenueSources = $this->getRevenueSources();
        
        // Get recent transactions
        $recentTransactions = $this->getRecentRevenueTransactions();
        
        return view('admin.financial.revenue', compact(
            'monthlyRevenue',
            'revenueSources',
            'recentTransactions'
        ));
    }
    
    /**
     * Display financial dashboard
     */
    public function dashboard(Request $request)
    {
        // Get overview statistics
        $stats = [
            'total_expenses' => $this->getTotalExpenses(),
            'total_revenue' => $this->getTotalRevenue(),
            'net_profit' => $this->getNetProfit(),
            'monthly_growth' => $this->getMonthlyGrowth(),
        ];
        
        // Get chart data
        $chartData = $this->getFinancialChartData();
        
        return view('admin.financial.dashboard', compact(
            'stats',
            'chartData'
        ));
    }
    
    /**
     * Get monthly expenses data
     */
    private function getMonthlyExpenses()
    {
        // Mock data for demonstration
        return [
            ['month' => 'يناير', 'amount' => 15000],
            ['month' => 'فبراير', 'amount' => 18000],
            ['month' => 'مارس', 'amount' => 12000],
            ['month' => 'أبريل', 'amount' => 22000],
            ['month' => 'مايو', 'amount' => 19000],
            ['month' => 'يونيو', 'amount' => 25000],
        ];
    }
    
    /**
     * Get expense categories
     */
    private function getExpenseCategories()
    {
        return [
            ['name' => 'الرواتب', 'amount' => 45000, 'percentage' => 45],
            ['name' => 'الإعلانات', 'amount' => 20000, 'percentage' => 20],
            ['name' => 'الاستضافة', 'amount' => 15000, 'percentage' => 15],
            ['name' => 'المحتوى', 'amount' => 12000, 'percentage' => 12],
            ['name' => 'أخرى', 'amount' => 8000, 'percentage' => 8],
        ];
    }
    
    /**
     * Get recent transactions
     */
    private function getRecentTransactions()
    {
        return [
            ['date' => '2024-06-15', 'description' => 'دفع استضافة الخادم', 'amount' => 2000, 'type' => 'expense'],
            ['date' => '2024-06-14', 'description' => 'إعلانات فيسبوك', 'amount' => 1500, 'type' => 'expense'],
            ['date' => '2024-06-13', 'description' => 'شراء محتوى', 'amount' => 800, 'type' => 'expense'],
            ['date' => '2024-06-12', 'description' => 'صيانة الموقع', 'amount' => 500, 'type' => 'expense'],
            ['date' => '2024-06-11', 'description' => 'تراخيص البرمجيات', 'amount' => 1200, 'type' => 'expense'],
        ];
    }
    
    /**
     * Get monthly revenue data
     */
    private function getMonthlyRevenue()
    {
        return [
            ['month' => 'يناير', 'amount' => 25000],
            ['month' => 'فبراير', 'amount' => 28000],
            ['month' => 'مارس', 'amount' => 32000],
            ['month' => 'أبريل', 'amount' => 35000],
            ['month' => 'مايو', 'amount' => 38000],
            ['month' => 'يونيو', 'amount' => 42000],
        ];
    }
    
    /**
     * Get revenue sources
     */
    private function getRevenueSources()
    {
        return [
            ['name' => 'الاشتراكات', 'amount' => 85000, 'percentage' => 55],
            ['name' => 'الإعلانات', 'amount' => 45000, 'percentage' => 29],
            ['name' => 'الكتب المباعة', 'amount' => 18000, 'percentage' => 12],
            ['name' => 'دورات', 'amount' => 7000, 'percentage' => 4],
        ];
    }
    
    /**
     * Get recent revenue transactions
     */
    private function getRecentRevenueTransactions()
    {
        return [
            ['date' => '2024-06-15', 'description' => 'اشتراك شهري', 'amount' => 299, 'type' => 'revenue'],
            ['date' => '2024-06-14', 'description' => 'بيع كتاب', 'amount' => 49, 'type' => 'revenue'],
            ['date' => '2024-06-13', 'description' => 'إعلانات جوجل', 'amount' => 1250, 'type' => 'revenue'],
            ['date' => '2024-06-12', 'description' => 'اشتراك سنوي', 'amount' => 2999, 'type' => 'revenue'],
            ['date' => '2024-06-11', 'description' => 'دورة تدريبية', 'amount' => 199, 'type' => 'revenue'],
        ];
    }
    
    /**
     * Get total expenses
     */
    private function getTotalExpenses()
    {
        return 100000; // Mock data
    }
    
    /**
     * Get total revenue
     */
    private function getTotalRevenue()
    {
        return 155000; // Mock data
    }
    
    /**
     * Get net profit
     */
    private function getNetProfit()
    {
        return $this->getTotalRevenue() - $this->getTotalExpenses();
    }
    
    /**
     * Get monthly growth
     */
    private function getMonthlyGrowth()
    {
        return 15.5; // Mock data - percentage
    }
    
    /**
     * Get financial chart data
     */
    private function getFinancialChartData()
    {
        return [
            'labels' => ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
            'revenue' => [25000, 28000, 32000, 35000, 38000, 42000],
            'expenses' => [15000, 18000, 12000, 22000, 19000, 25000],
            'profit' => [10000, 10000, 20000, 13000, 19000, 17000],
        ];
    }
}
