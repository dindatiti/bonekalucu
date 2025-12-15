ini isi dashboard
<?php
// page/dashboard.php atau page/admin/dashboard.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .header h1 {
            color: #333;
            font-size: 28px;
        }
        
        .search-box {
            position: relative;
            width: 300px;
        }
        
        .search-box input {
            width: 100%;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: white;
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }
        
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .stat-card.green {
            border-top: 4px solid #4CAF50;
        }
        
        .stat-card.blue {
            border-top: 4px solid #2196F3;
        }
        
        .stat-card.orange {
            border-top: 4px solid #FF9800;
        }
        
        .stat-card.purple {
            border-top: 4px solid #9C27B0;
        }
        
        .stat-title {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        
        .stat-change {
            color: #4CAF50;
            font-size: 14px;
            font-weight: 600;
        }
        
        .stat-change.negative {
            color: #f44336;
        }
        
        .stat-info {
            font-size: 13px;
            color: #777;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }
        
        .charts-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        @media (max-width: 1024px) {
            .charts-container {
                grid-template-columns: 1fr;
            }
        }
        
        .chart-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .chart-header h3 {
            color: #333;
            font-size: 18px;
        }
        
        .period-selector {
            display: flex;
            gap: 10px;
        }
        
        .period-btn {
            padding: 6px 12px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }
        
        .period-btn.active {
            background: #2196F3;
            color: white;
            border-color: #2196F3;
        }
        
        .chart-placeholder {
            height: 300px;
            background: #f8f9fa;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #666;
        }
        
        .chart-placeholder i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #ccc;
        }
        
        .income-overview {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .income-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .income-header h3 {
            color: #333;
            font-size: 18px;
        }
        
        .week-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .week-stat {
            text-align: center;
        }
        
        .week-value {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        
        .week-label {
            color: #666;
            font-size: 14px;
        }
        
        .menu-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .menu-link {
            padding: 10px 20px;
            background: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: background 0.3s;
        }
        
        .menu-link:hover {
            background: #1976D2;
        }
        
        .menu-link.secondary {
            background: #6c757d;
        }
        
        .menu-link.secondary:hover {
            background: #5a6268;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <div class="header">
            <h1>Admin Dashboard</h1>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="stat-card green">
                <div class="stat-title">
                    <span>Total Page Views</span>
                    <span class="stat-change">50.3% <i class="fas fa-arrow-up"></i></span>
                </div>
                <div class="stat-value">4,42,236</div>
                <div class="stat-info">You made an extra 30,000 this year</div>
            </div>
            
            <div class="stat-card blue">
                <div class="stat-title">
                    <span>Total Users</span>
                    <span class="stat-change">70.5% <i class="fas fa-arrow-up"></i></span>
                </div>
                <div class="stat-value">78,250</div>
                <div class="stat-info">You made an extra 8,800 this year</div>
            </div>
            
            <div class="stat-card orange">
                <div class="stat-title">
                    <span>Total Order</span>
                    <span class="stat-change">27.4% <i class="fas fa-arrow-up"></i></span>
                </div>
                <div class="stat-value">18,800</div>
                <div class="stat-info">You made an extra 1940 this year</div>
            </div>
            
            <div class="stat-card purple">
                <div class="stat-title">
                    <span>Total Sales</span>
                    <span class="stat-change">27.4% <i class="fas fa-arrow-up"></i></span>
                </div>
                <div class="stat-value">$35,078</div>
                <div class="stat-info">You made an extra $60,386 this year</div>
            </div>
        </div>
        
        <!-- Charts Section -->
        <div class="charts-container">
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Unique Visitor</h3>
                    <div class="period-selector">
                        <button class="period-btn active">Month</button>
                        <button class="period-btn">Week</button>
                    </div>
                </div>
                <div class="chart-placeholder">
                    <i class="fas fa-chart-line"></i>
                    <p>Visitor Chart Visualization</p>
                    <div style="margin-top: 20px; text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 10px;">
                            <span><i class="fas fa-circle" style="color: #4CAF50;"></i> 120</span>
                            <span><i class="fas fa-circle" style="color: #2196F3;"></i> 90</span>
                            <span><i class="fas fa-circle" style="color: #FF9800;"></i> 60</span>
                            <span><i class="fas fa-circle" style="color: #9C27B0;"></i> 30</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Income Overview</h3>
                </div>
                <div class="chart-placeholder">
                    <i class="fas fa-chart-pie"></i>
                    <p>Income Chart Visualization</p>
                </div>
            </div>
        </div>
        
        <!-- Income Overview -->
        <div class="income-overview">
            <div class="income-header">
                <h3>This Week Statistics</h3>
            </div>
            <div class="week-stats">
                <div class="week-stat">
                    <div class="week-value">$7,650</div>
                    <div class="week-label">Revenue</div>
                </div>
                <div class="week-stat">
                    <div class="week-value">1,240</div>
                    <div class="week-label">Orders</div>
                </div>
                <div class="week-stat">
                    <div class="week-value">$3,250</div>
                    <div class="week-label">Profit</div>
                </div>
                <div class="week-stat">
                    <div class="week-value">8,540</div>
                    <div class="week-label">Visitors</div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Links -->
        <div class="menu-links">
            <a href="?page=dashboard" class="menu-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="?page=kategori&action=create" class="menu-link secondary"><i class="fas fa-plus"></i> Input Kategori</a>
            <a href="?page=kategori&action=index" class="menu-link secondary"><i class="fas fa-list"></i> Tampil Kategori</a>
        </div>
    </div>
    
    <script>
        // Simple interactivity
        document.querySelectorAll('.period-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.period-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Search functionality
        document.querySelector('.search-box input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                alert('Searching for: ' + this.value);
            }
        });
    </script>
</body>
</html>