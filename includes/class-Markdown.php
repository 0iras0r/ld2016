<?php
# Linux Day 2016 - Markdown autoloader
# Copyright (C) 2016 Valerio Bozzolan
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

require LIBMARKDOWN_PATH;

class Markdown {
	static function parse($s, $args = []) {
		$s = markdown($s);

		// Custom paragraph class
		if( ! empty( $args['p'] ) ) {
			$p = sprintf(
				'<p class="%s">',
				$args['p']
			);

			$s = str_replace('<p>', $p, $s);
		}

		// Stripping displayed link protocols
		$s = str_replace( [
			'>http://',
			'>https://'
		], '>', $s);

		// Tartet blank as default
		$s = str_replace('<a ', '<a target="_blank" ', $s);

		return $s;
	}
}
