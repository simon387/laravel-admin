import React from 'react';
import './App.css';
import {BrowserRouter, Route} from "react-router-dom";
import Dashboard from "./pages/Dashboard";
import Register from "./pages/Register";
import Login from "./pages/Login";
import Users from "./pages/users/Users";
import UserCreate from "./pages/users/UserCreate";
import UserEdit from "./pages/users/UserEdit";
import Roles from "./pages/roles/Roles";

function App() {
	return (
		<div className="App">
			<BrowserRouter>
				<Route path={'/'} exact component={Dashboard}/>
				<Route path={'/register'} component={Register}/>
				<Route path={'/login'} component={Login}/>
				<Route path={'/users'} exact component={Users}/>
				<Route path={'/users/create'} component={UserCreate}/>
				<Route path={'/users/:id/edit'} component={UserEdit}/>
				<Route path={'/roles'} exact component={Roles}/>
			</BrowserRouter>
		</div>
	);
}

export default App;
