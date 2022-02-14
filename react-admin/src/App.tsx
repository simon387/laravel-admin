import React from 'react';
import './App.css';
import {BrowserRouter, Route, Routes} from "react-router-dom";
import Dashboard from "./pages/Dashboard";
import Register from "./pages/Register";
import Login from "./pages/Login";
import Users from "./pages/users/Users";

function App() {
	return (
		<div className="App">
			<BrowserRouter>
				<Routes>
					<Route path={'/'} element={<Dashboard/>}/>
					<Route path={'/users'} element={<Users/>}/>
					<Route path={'/register'} element={<Register/>}/>
					<Route path={'/login'} element={<Login/>}/>
				</Routes>
			</BrowserRouter>
		</div>
	);
}

export default App;
