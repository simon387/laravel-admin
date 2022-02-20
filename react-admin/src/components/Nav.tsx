import React, {useEffect, useState} from "react";
import axios from "axios";
import {Link} from "react-router-dom";
import {User} from "../models/User";
import {connect} from "react-redux";

const Nav = (props: {user: User}) => {
	// const [user, setUser] = useState(new User());

	// useEffect(() => {
	// 	(async () => {
	// 		const {data} = await axios.get('user');
	// 		setUser(new User(
	// 			data.id,
	// 			data.first_name,
	// 			data.last_name,
	// 			data.email,
	// 			data.role,
	// 		));
	// 	})()
	// }, []);
	// VECCHIO METODO, SENZA REDUX


	const logout = async () => {
		await axios.post('logout', {});
	};

	return (
		<nav className="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a className="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
			<ul className="my-2 my-md-0 mr-md-3">
				<Link to="/profile" className="p-2 text-white text-decoration-none">{props.user.name}</Link>
				<Link to="/login" className="p-2 text-white text-decoration-none"
				   onClick={logout}>Sign out</Link>
			</ul>
		</nav>
	);
}

const mapStateToProps = (state: { user: User }) => {
	// is where we get in every component we will get the event from other components
	return {
		user: state.user, // here we get the user from the state
	}
}

export default connect(mapStateToProps)(Nav);
