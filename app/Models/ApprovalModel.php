<?php

namespace App\Models;

use CodeIgniter\Model;

class ApprovalModel extends Model
{
    protected $table = 'approval';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'reservation_id', 
        'approver_id', 
        'status', 
        'comments',
        'approved_at', 
    
    
    ];
        public function getApprovalWithUser($status = 'Pending')
    {
        return $this->select('approval.id, approval.reservation_id, approval.status, approval.comments, approval.approved_at, user.name as approver_name')
            ->join('user', 'approval.approver_id = user.id')
            ->where('user.level', 'approval') // Hanya ambil pengguna dengan level 'approval'
            ->where('approval.status', $status)
            ->findAll();
    }
  }
