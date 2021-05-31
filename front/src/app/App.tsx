import React from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Home from './components/home';
import About from './components/about';

const App: React.FunctionComponent = () => {
  return (
    <BrowserRouter>
      <Switch>
        <Route component={Home} path="/" exact/>
        <Route component={About} path="/about" exact/>
      </Switch>
    </BrowserRouter>
  );
}

export default App;