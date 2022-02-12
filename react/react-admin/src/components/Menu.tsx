import React from "react";

//hooks method of component
const Menu = () => {
	return (
		<nav id="sidebarMenu" className="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div className="position-sticky pt-3">
				<ul className="nav flex-column">
					<li className="nav-item">
						<a className="nav-link active">
							<span data-feather="home"></span>
							Dashboard
						</a>
					</li>
				</ul>
			</div>
		</nav>
	);
}

export default Menu;
