<?php namespace UptimeStatus;

class Filters {

	public static function globalstatus() {
		return new \Twig\TwigFilter('globalstatus', function (array $stats, int $total) {
			if ($stats[3] > 0) return 3;
			if ($stats[1] == $total) return 1;
			if ($stats[1] == 0) return 0;
			return 2;
		});
	}

	public static function statusicon() {
		return new \Twig\TwigFilter('statusicon', function (int $status, string $suffix = "svg") {
			$icons = ["error", "success", "warning", "maintenance"];
			return "/icon/{$icons[$status]}.$suffix";
		});
	}

	public static function statuscolor() {
		return new \Twig\TwigFilter('statuscolor', function (int $status) {
			return ["#F87171", "#10B981", "#FFBB6D", "#9575cd"][$status];
		});
	}

}