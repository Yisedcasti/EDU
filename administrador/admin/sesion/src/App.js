import React, { useEffect } from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Login from './components/LoginForm';

const App = () => {
  useEffect(() => {
    // Redirige a la URL externa cuando la aplicación React se cargue
    window.location.href = "http://localhost/doce/administrador/index.php";
  }, []);

  return (
    <Router>
      <Routes>
        {/* Rutas de tu aplicación */}
        <Route path="/login" element={<Login />} />
      </Routes>
    </Router>
  );
};

export default App;
