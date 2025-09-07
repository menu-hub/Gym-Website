
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Trainers | FitZone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Main Styles */
        :root {
            --primary: #ff6b6b;
            --secondary: #4ecdc4;
            --dark: #2d3436;
            --light: #f5f5f5;
            --success: #00b894;
            --warning: #fdcb6e;
            --danger: #d63031;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: #f8f9fa;
            color: var(--dark);
        }
        
        .container {
            width: 95%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        
        /* Header Styles */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .page-title {
            color: var(--primary);
            font-size: 28px;
        }
        
        /* Search and Add New */
        .action-bar {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .search-box {
            position: relative;
            min-width: 250px;
        }
        
        .search-box input {
            padding: 10px 15px 10px 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: #ff5252;
        }
        
        /* Table Styles */
        .trainers-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .trainers-table th, 
        .trainers-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .trainers-table th {
            background: var(--dark);
            color: white;
            font-weight: 600;
        }
        
        .trainers-table tr:hover {
            background: #f9f9f9;
        }
        
        .trainers-table tr:nth-child(even) {
            background: #f8f9fa;
        }
        
        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .status-active {
            background: #d4edda;
            color: var(--success);
        }
        
        .status-inactive {
            background: #f8d7da;
            color: var(--danger);
        }
        
        /* Action Buttons */
        .action-btns {
            display: flex;
            gap: 10px;
        }
        
        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
            min-width: 70px;
        }
        
        .btn-edit {
            background: var(--warning);
            color: var(--dark);
        }
        
        .btn-edit:hover {
            background: #e17055;
            color: white;
        }
        
        .btn-delete {
            background: var(--danger);
            color: white;
        }
        
        .btn-delete:hover {
            background: #b71540;
        }
        
        .btn-view {
            background: var(--secondary);
            color: white;
        }
        
        .btn-view:hover {
            background: #00a8b5;
        }
        
        /* Trainer Image */
        .trainer-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #eee;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 5px;
        }
        
        .page-item {
            list-style: none;
        }
        
        .page-link {
            display: block;
            padding: 8px 15px;
            border: 1px solid #ddd;
            color: var(--dark);
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .page-link:hover {
            background: #eee;
        }
        
        .page-active .page-link {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .page-disabled .page-link {
            color: #999;
            pointer-events: none;
        }
        
        /* Responsive Table */
        @media (max-width: 768px) {
            .trainers-table {
                display: block;
                overflow-x: auto;
            }
            
            .action-btns {
                flex-wrap: wrap;
            }
        }
        
        /* No Results */
        .no-results {
            text-align: center;
            padding: 50px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Manage Trainers</h1>
            <div class="action-bar">
                <form method="GET" class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Search trainers..." value="<?php echo htmlspecialchars($search); ?>">
                </form>
                <a href="add_trainer.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Trainer
                </a>
            </div>
        </div>
        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="trainers-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Specialty</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($trainer = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>
                                <?php if (!empty($trainer['image'])): ?>
                                    <img src="<?php echo $trainer['image']; ?>" alt="<?php echo htmlspecialchars($trainer['name']); ?>" class="trainer-img">
                                <?php else: ?>
                                    <div class="trainer-img" style="background: #eee; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user" style="color: #999;"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($trainer['name']); ?></td>
                            <td><?php echo htmlspecialchars($trainer['specialty']); ?></td>
                            <td>
                                <div><?php echo htmlspecialchars($trainer['email']); ?></div>
                                <div><?php echo htmlspecialchars($trainer['phone']); ?></div>
                            </td>
                            <td>
                                <span class="status-badge status-<?php echo $trainer['status']; ?>">
                                    <?php echo ucfirst($trainer['status']); ?>
                                </span>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <a href="view_trainer.php?id=<?php echo $trainer['trainer_id']; ?>" class="btn btn-sm btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="edit_trainer.php?id=<?php echo $trainer['trainer_id']; ?>" class="btn btn-sm btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="deletetrainer.php?id=<?php echo $trainer['trainer_id']; ?>" class="btn btn-sm btn-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this trainer?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            
            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <ul class="pagination">
                    <li class="page-item <?php echo ($page <= 1) ? 'page-disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page-1; ?>&search=<?php echo urlencode($search); ?>">Previous</a>
                    </li>
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'page-active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <li class="page-item <?php echo ($page >= $total_pages) ? 'page-disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page+1; ?>&search=<?php echo urlencode($search); ?>">Next</a>
                    </li>
                </ul>
            <?php endif; ?>
            
        <?php else: ?>
            <div class="no-results">
                <i class="fas fa-user-slash" style="font-size: 50px; margin-bottom: 20px; color: #ddd;"></i>
                <h3>No Trainers Found</h3>
                <p>Try adjusting your search or add a new trainer</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>