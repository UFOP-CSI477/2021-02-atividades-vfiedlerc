import { useState } from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";

import { AuthProvider } from './contexts/auth';
import GlobalStyles from "./globalStyles";
import { Home } from "./pages/Home";
import { Login } from "./pages/Login";
import { Register } from "./pages/Register";

function App() {
  return (
    <AuthProvider>
      <GlobalStyles />
      <BrowserRouter>
        <Routes>
          <Route exact path="/" element={<Home />}/>
          <Route exact path="/login" element={<Login />}/>
          <Route exact path="/register" element={<Register />}/>
        </Routes>
      </BrowserRouter>
    </AuthProvider>
  );
}

export default App;
