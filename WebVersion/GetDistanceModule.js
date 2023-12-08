class Point {
    constructor(l, L) {
        const deg2rad = (d) => {return d * Math.PI / 180}
        this.l = deg2rad(l);
        this.L = deg2rad(L);
    }
}


function getDistanceFromPoints(p0, p1) {
    let R = 6371.0;
    return Math.acos(
        (Math.sin(p0.l) * Math.sin(p1.l)) + (Math.cos(p0.l) * Math.cos(p1.l) * Math.cos(p1.L - p0.L))
    ) * R;
}


function getDistance(l0, L0, l1, L1) {
    let point0 = new Point(l0, L0);
    let point1 = new Point(l1, L1);
    return getDistanceFromPoints(point0, point1);
}