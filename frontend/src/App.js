// React stuff
import { useContext, Fragment, useEffect, useState } from 'react'
import { StateContext } from './context/State'

// Styles
import './style.css'

// 3rd Party Lib
import { Switch, Route } from "react-router-dom"
import { BrowserView, useMobileOrientation, mobileModel } from 'react-device-detect';
import Helmet from 'react-helmet'

// Pages
import Home from "./pages/Home";
import Client from "./pages/Client";
import Service from "./pages/Service";
import Contact from "./pages/Contact";

// Components
import Header from './components/Header'
import Footer from './components/Footer'
import Cursor from "./components/Cursor"
import Modal from './components/Modal';

function App() {

    const [loading, setLoading] = useState(true);

    const { fonts } = useContext(StateContext);

    const search = window.location.search.replace("?", "");

    const mobileOrientation = useMobileOrientation();

    const { settings } = useContext(StateContext)
    const { openModal, cursor } = useContext(StateContext)

    const clickOnStage = ( e ) => {
      if( cursor.active === false ) {
        openModal()
      }
    }

  
    useEffect( ()=> {
      setTimeout( ()=> {
        setLoading(false)
        console.log(loading)
      }, 1000)      
     }, [])


     const css = `
      ::selection {
        background: ${settings.selection_color};
        color: #FFFFFF;
      }

      ::-moz-selection {
        background: ${settings.selection_color};
        color: #FFFFFF;
      }
    `

  return (
    <>
    { loading ? null : 
      <div className={`App animating ${search && search} ${mobileOrientation.orientation} ${mobileModel}`}>
        <div className="stage" onClick={clickOnStage}>

          {
            fonts?.map( (f, idx) => (
                      <Fragment key={idx} >
                        <style id={idx}> @import url('{f?.link}');</style>
                      </Fragment>
                        )
                      )
          }
          
          <style>{css}</style>
        
          <Helmet>
            <title>{settings.site_name}</title>
            <meta name="description" content={settings.site_desc} />
            <link rel="icon" type="image/png" href={`${process.env.REACT_APP_UPLOADS_URL}/${settings.favicon_url}`} sizes="16x16" />
          </Helmet>

          <Header />
            <Switch>
              <Route exact path="/">
                <Home />
              </Route>
              <Route path="/client">
                <Client />
              </Route>
              <Route path="/service">
                <Service />
              </Route>
              <Route path="/contact">
                <Contact />
              </Route>
            </Switch>
          <Footer />
        </div>
        <BrowserView>
          <Cursor />
        </BrowserView> 

        <Modal />
      </div>
    }
      
    </>
  );
}

export default App;
