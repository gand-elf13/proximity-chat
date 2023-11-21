<?php
class Point
{
	public $l;
	public $L;
}


export function createPoint ($l, $L) {
	$newPoint = new Point();
	$newPoint -> l = deg2rad($l);
	$newPoint -> L = deg2rad($L);
	return $newPoint;
}


export function getDistanceFromPoints ($p0, $p1) {
	$R = 6371.0;
	return acos
	(
		(sin ($p0->l) * sin ($p1->l)) + (cos ($p0->l) * cos ($p1->l) * cos ($p1->L - $p0->L))
	) * $R;
}


export function getDistance ($l0, $L0, $l1, $L1) {
	$point0 = createPoint ($l0, $L0);
	$point1 = createPoint ($l1, $L1);
	$distance = getDistanceFromPoints ($point0, $point1);
	return round($distance, 1);
}