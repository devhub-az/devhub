import React from 'react';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import Home from './components/pages/home';
import About from './components/pages/about';
import Header from "./components/include/header";
import Footer from "./components/include/footer";

const App: React.FunctionComponent = () => {
    return (
        <BrowserRouter>
            <Header/>
            <Switch>
                <Route component={Home} path="/" exact/>
                <Route component={About} path="/about" exact/>
            </Switch>
            <Footer />
        </BrowserRouter>
    );
}

export default App;
