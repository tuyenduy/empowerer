<?php
/**
 * Template functions
 * for functions to work with template example: get main column size, calculate or check things, ...
 * 
 * @package bootstrap-basic
 */


if (!function_exists('bootstrapBasicGetMainColumnSize')) {
	/**
	 * Determine main column size from actived sidebar
	 * 
	 * For theme designer:
	 * By using this column size, Bootstrap grid size is 12. 
	 * You may change grid size of sidebar column to number you want; example sidebar-left.php grid 2, sidebar-right.php grid 3.
	 * Get Bootstrap grid size minus total sidebar grid size as conditions below this line.
	 * Both sidebar active. (12-2-3) = 7. Main column size is 7.
	 * Only left sidebar active. (12-2) = 10. Main column size is 10.
	 * Only right sidebar active. (12-3) = 9. Main column size is 9.
	 * No sidebar active. Main column is 12.
	 * Now, you write the condition above into the function below and return column size value.
	 * 
	 * @return integer return column size.
	 */
	function bootstrapBasicGetMainColumnSize() 
	{
		if (is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
			// if both sidebar actived.
			$main_column_size = 6;
		} elseif (
				(is_active_sidebar('sidebar-left') && !is_active_sidebar('sidebar-right')) || 
				(is_active_sidebar('sidebar-right') && !is_active_sidebar('sidebar-left'))
		) {
			// if only one sidebar actived.
			$main_column_size = 9;
		} else {
			// if no sidebar actived.
			$main_column_size = 12;
		}

		return $main_column_size;
	}// bootstrapBasicGetMainColumnSize
}
function the_breadcrumb() {
		echo '<ul id="crumbs">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}