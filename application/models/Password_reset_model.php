<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Password_reset_model extends CI_Model
{
    public function create($user_id, $selector, $token_hash, DateTime $expires)
    {
        $this->db->insert('password_resets', [
            'user_id'    => $user_id,
            'selector'   => $selector,
            'token_hash' => $token_hash,
            'expires_at' => $expires->format('Y-m-d H:i:s'),
            'used'       => 0,
        ]);
    }

    public function find_valid($selector)
    {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        return $this->db->where('selector', $selector)
            ->where('used', 0)
            ->where('expires_at >', $now)
            ->get('password_resets')
            ->row_array();
    }

    public function mark_used($id)
    {
        $this->db->where('id', $id)->update('password_resets', ['used' => 1]);
        // Optional: also invalidate other outstanding tokens for this user
        // $this->db->where('user_id', $user_id)->update('password_resets', ['used' => 1]);
    }

    // Simple throttle: limit to 1 request / 5 minutes per user or per IP
    public function can_request_reset($user_id, $ip)
    {
        $fiveMinAgo = (new DateTime('-5 minutes'))->format('Y-m-d H:i:s');
        $recent = $this->db->where('user_id', $user_id)
            ->where('created_at >', $fiveMinAgo)
            ->get('password_resets')
            ->row_array();
        return !$recent;
    }
}
