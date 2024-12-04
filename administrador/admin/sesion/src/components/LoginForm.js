import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import "../styles.css"; 
import logo from "../logo.png"; 
import axios from "axios"; 

const Login = () => {
  const [user, setUser] = useState("");
  const [pass, setPass] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const handleLogin = async (e) => {
    e.preventDefault();

    if (!user || !pass) {
      setError("Por favor, ingresa tanto el usuario como la contraseña.");
      return;
    }

    try {
      const response = await axios.post(
        "http://localhost/doce/administrador/admin/servidor/",
        {
          user,
          pass,
        },
        {
          headers: {
            "Content-Type": "application/json",
          },
        }
      );

      console.log("Respuesta del servidor:", response.data); // Agregar esto para ver la respuesta completa

      const responseData = response.data;

      if (responseData.status === "success") {
        const { role, idUser } = responseData.data;
        localStorage.setItem("idUser", idUser);
        localStorage.setItem("role", role); // Guarda el rol para uso futuro

        // Verifica el valor de `role` y redirige según corresponda
        switch (role) {
          case 1:
            window.location.href = "http://localhost/doce/administrador/admin/pag_Admin.php";
            break;
          case 2:
            window.location.href = "http://localhost/doce/administrador/admin/pag_Coordinador.php";
            break;
          case 3:
            window.location.href = "http://localhost/doce/administrador/admin/pag_Rector.php";
            break;
          case 4:
            window.location.href = "http://localhost/doce/administrador/admin/pag_Secretaria.php";
            break;
          case 5:
            window.location.href = "http://localhost/doce/administrador/admin/pag_Profesor.php";
            break;
          case 6:
            window.location.href = "http://localhost/doce/administrador/admin/pag_Estusiante.php";
            break;
          default:
            setError("No se reconoció el rol.");
            break;
        }
      } else {
        setError(responseData.message || "Error desconocido al iniciar sesión.");
      }
    } catch (err) {
      console.error("Error en la conexión con el servidor:", err);
      // Si la respuesta es un error, muestra el error real
      if (err.response) {
        setError(`Error del servidor: ${err.response.data.message || "No se pudo conectar con el servidor."}`);
      } else {
        setError("No se pudo conectar con el servidor. Inténtalo más tarde.");
      }
    }
  };

  return (
    <div>
      <header className="navbar navbar-expand-lg bg-body-dark containernav shadow">
        <div className="container d-flex justify-content-between align-items-center">
          <a className="navbar-brand fw-bold text-success d-flex align-items-center gap-2" href="#">
            <img src={logo} alt="Logo EDUFAST" width="40" height="40" />
            <span className="text-white">EDUFAST</span>
          </a>
        </div>
      </header>

      <main className="main-container">
        <div className="container mt-5 d-flex justify-content-center p-3">
          <form className="col-md-6" onSubmit={handleLogin}>
            <h1 className="text-center text-dark">Inicio de sesión</h1>

            {/* Error message */}
            {error && (
              <div className="alert alert-danger" role="alert">
                {error}
              </div>
            )}

            <div className="mb-3">
              <label htmlFor="user" className="form-label ps-3"><b>Usuario:</b></label>
              <input
                type="text"
                className="form-control"
                id="user"
                placeholder="Ingresa tu usuario"
                value={user}
                onChange={(e) => setUser(e.target.value)}
                required
              />
            </div>

            <div className="mb-3">
              <label htmlFor="pass" className="form-label ps-3"><b>Contraseña:</b></label>
              <input
                type="password"
                className="form-control"
                id="pass"
                placeholder="Ingresa tu contraseña"
                value={pass}
                onChange={(e) => setPass(e.target.value)}
                required
              />
            </div>

            <div className="text-end">
              <a className="olvido" href="#">¿Olvidaste tu contraseña?</a>
            </div>

            <div className="text-center">
              <button type="submit" className="btn btn-primary mt-4">Iniciar sesión</button>
            </div>
          </form>
        </div>
      </main>
    </div>
  );
};

export default Login;
