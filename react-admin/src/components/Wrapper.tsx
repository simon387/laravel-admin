import React, {Dispatch, useEffect, useState} from 'react';
import Nav from "./Nav";
import Menu from "./Menu";
import axios from "axios";
import {Redirect} from "react-router-dom";
import {connect} from 'react-redux';
import {User} from "../models/User";
import {setUser} from "../redux/actions/setUserAction";

const Wrapper = (props: any) => {
	const [redirect, setRedirect] = useState(false);

	useEffect(() => {
		(async () => {
			try {
				const {data} = await axios.get('user');

				// redux
				props.setUser(new User(
					data.id,
					data.first_name,
					data.last_name,
					data.email,
					data.role,
				));

			} catch (e) {
				setRedirect(true);
			}
			// setUser(data);
		})()
	}, []);

	if (redirect) {
		return <Redirect to="/login"/>
	}

	return (
		<>
			<Nav/>
			<div className="container-fluid">
				<div className="row">
					<Menu/>
					<main className="col-md-9 ms-sm-auto col-lg-10 px-md-4">
						{props.children}
					</main>
				</div>
			</div>
		</>
	);
}

const mapStateToProps = (state: { user: User }) => {
	// is where we get in every component we will get the event from other components
	return {
		user: state.user, // here we get the user from the state
	}
}

const mapDispatchToProps = (dispatch: Dispatch<any>) => {
	// send the event to other components
	return {
		setUser: (user: User) => dispatch(setUser(user)) // here we dispatch the user using the action
	}
}

export default connect(mapStateToProps, mapDispatchToProps)(Wrapper);
