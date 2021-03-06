import React from 'react'
import { Link, useHistory } from 'react-router-dom'
// import axios from 'axios'
// import { API_BASE_URL } from '../../../config/config'


const Home = () => {

      const history = useHistory();
      const logoutRequest =()=> {
         
         localStorage.removeItem('token');
         
         history.push('/');

      }

        return (
            <header>

               <nav className="navbar navbar-expand-lg navbar-dark">
                  <div className="container-fluid">
                     
                     <Link to="#" className='AppLauncher'>
                        ::
                     </Link>

                     <Link to="#" className="navbar-brand">Admin</Link>

                     <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                     </button>

                     <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                           <li className="nav-item">
                              <Link to="#/" className="nav-link">Dashboard</Link>
                           </li>
                        </ul>

                        <ul className="navbar-nav my-auto mb-2 mb-lg-0 navbar-right">
                           
                              {
                                 localStorage.getItem('token')
                              ?
                              <>
                              
                              <li className="nav-item dropdown">
                                 <Link to="#" className="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    User
                                 </Link>
                                 <ul className="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><Link to="/dashboard" className="dropdown-item">Dashboard</Link></li>
                                    <li className="nav-item">
                                       <button onClick={logoutRequest}
                                                className="dropdown-item">Logout</button>
                                    </li>
                                 </ul>
                              </li>
                              </>
                              :
                              <li className="nav-item">
                                 <Link to="/login" className="nav-link">Login</Link>
                              </li>
                              }

                        </ul>

                        
                     </div>
                  </div>
               </nav>
               
            </header>
          )
}

export default Home