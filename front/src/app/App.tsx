import React from 'react';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import Home from './components/pages/home';
import About from './components/pages/about';
import Header from "./components/include/header";
import Footer from "./components/include/footer";
import Hubs from './components/pages/hubs';
import Authors from './components/pages/authors';
import NotFoundError from './components/pages/error-not-found';
import ServerError from './components/pages/server-error';
import Login from './components/pages/login';
import Register from './components/pages/register';

const App: React.FunctionComponent = () => {
    const isHeaderFooterVisible = (): Boolean => {
        const path = window.location.pathname;
        if(path === '/login' || path === '/register') {
            return false;
        }
        return true;
    }

    return (
        <BrowserRouter>
            { isHeaderFooterVisible() ? <Header/> : null }
            <Switch>
                <Route exact component={Home} path="/"/>
                <Route exact component={Login} path="/login"/>
                <Route exact component={Register} path="/register"/>
                <Route exact component={Hubs} path="/hubs"/>
                {/* <Route exact component={} path="/hubs:name"/> */}
                <Route exact component={Authors} path="/authors"/>
                <Route exact component={About} path="/about"/>
                <Route exact component={ServerError} path="/server-error"/>
                {/* <Route exact component={} path="/article/:id"> */}
                <Route component={NotFoundError} path="*"/>
            </Switch>
            { isHeaderFooterVisible() ? <Footer/> : null }
        </BrowserRouter>
    );
}

export default App;
