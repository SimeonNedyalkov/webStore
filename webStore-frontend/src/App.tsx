import { useState } from "react";
import { Route, Routes } from "react-router-dom";
import Register from "./user/Register";
import Login from "./user/Login";
import Home from "./app/Home";
import Navbar from "./app/Navigation";

function App() {
    const [count, setCount] = useState(0);

    return (
        <>
            <Navbar></Navbar>
            <Routes>
                <Route path="/home" element={<Home />} />
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />
            </Routes>
        </>
    );
}

export default App;
