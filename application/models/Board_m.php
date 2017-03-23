<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_list($table = 'ci_board' , $type = '', $offset = '', $limit = '', $search_word = '')
	{
		$sword = '';

		if ( $search_word != '' )
		{
			//검색어가 있을경우 처리
			$sword = ' WHERE subject like "%' . $search_word . '%" or contents like "%' . $search_word . '%" ';
		}

		$limit_query = '';

		if ( $limit != '' || $offset != '' )
		{
			//페이징이 있을 경우 처리
			$limit_query = ' LIMIT ' . $offset . ', ' . $limit;
		}

		$sql = "SELECT * FROM " . $table . $sword ." ORDER BY board_id DESC" . $limit_query;
		$query = $this->db->query($sql);

		if ( $type == 'count' )
		{
			//전체 게시물 수 반환
			$result = $query->num_rows();

		}
		else
		{
			//게시물 리스트 반환
			$result = $query->result();
		}


		return $result;
	}

	/* 게시물 상세보기 가져오기 */
	public function get_view($table,$id)
	{
		//조횟수 증가
		$sql0 = "UPDATE {$table} SET hits = hits+1 WHERE board_id = '{$id}'";
		$this->db->query($sql0);

		$sql = "SELECT * FROM {$table} WHERE board_id = '{$id}'";
		$query = $this->db->query($sql);

		//게시물 내용 반환
		$result = $query->row();

		return $result;
	}
	
}
