import React from 'react';
import './App.css';
import Nav from "./components/Nav";
import Menu from "./components/Menu";
import Dashboard from "./components/pages/Dashboard";
import {BrowserRouter, Route, Routes} from "react-router-dom";
import Users from "./components/pages/Users";

function App() {
	return (
		<div className="App">
			<BrowserRouter>
				<Nav/>
				<div className="container-fluid">
					<div className="row">
						<Menu/>
						<main className="col-md-9 ms-sm-auto col-lg-10 px-md-4">
							<Routes>
								<Route path={'/'} element={<Dashboard/>}/>
								<Route path={'/users'} element={<Users/>}/>
							</Routes>
						</main>
					</div>
				</div>
			</BrowserRouter>
		</div>
	);
}

export default App;
