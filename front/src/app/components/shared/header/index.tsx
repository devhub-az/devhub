import React, { useState } from 'react';
import { NavLink } from 'react-router-dom';

const Header: React.FunctionComponent = () => {
    // const [title, setTitle] = useState<string>("");
    // const changeHandler = (event: React.ChangeEvent<HTMLInputElement>) => {
        // setTitle(event.target.value);
        // setTitle(prev => {
        //     return prev+event.target.value;
        // });
    // }

    return (
        <div>
            <ul>
                <li>
                    <NavLink to="/">Home</NavLink>
                </li>
                <li>
                    <NavLink to="/about">About</NavLink>
                </li>
            </ul>
        </div>
    );
}

export default Header;