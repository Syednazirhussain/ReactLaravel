import { useContext, useState } from "react";
import useCursorHandlers from "../hooks/useCursorHandlers";
import { useLocation, Link } from 'react-router-dom'
import { StateContext } from "../context/State";


function Header(){

  const { settings } = useContext(StateContext);
  let style_links = { fontFamily: settings.links_font_family, fontSize: settings.links_size, color: settings.links_color, fontWeight: settings.links_weight };

  const style_link_hover = { backgroundColor: settings.hover_border_color, height: settings.hover_border_size }

  
  const cursorHandlers = useCursorHandlers();

  const { fonts } = useContext(StateContext);
  
  let {mediaQuery} = useContext(StateContext);
  let mq = window.matchMedia(mediaQuery);
  if (mq.matches) {
    style_links = { fontFamily: settings.links_font_family_mobile, color: settings.links_color_mobile, fontSize: settings.links_size_mobile, fontWeight: settings.links_weight_mobile, textAlign: settings.links_desktop_align_mobile }
  }

  //assigning location variable
  const location = useLocation();
  
  //destructuring pathname from location
  const { pathname } = location;

  //Javascript split method to get the name of the path in array
  const splitLocation = pathname.split("/");

    return(
      <>
          <header className="page-header">            
            <nav>
              <Link
                onClick={(e) => {e.stopPropagation(); }}  
                {...cursorHandlers} 
                to="/"
                style={style_links}
                className="nav-link logo"
              >
                {
                  splitLocation[1] === "" ?
                  <>
                    <span dangerouslySetInnerHTML={{__html: settings.site_logo_svg }}></span>
                  </>
                  :
                  <>
                    <span dangerouslySetInnerHTML={{__html: settings.site_logo_inactive_svg }}></span>
                  </>
                }
              </Link>
              <Link 
                onClick={(e) => {e.stopPropagation(); }}
                {...cursorHandlers} 
                to="/contact" 
                style={style_links}
                className={ "nav-link " + ( splitLocation[1] === "contact" ? "active" : "non-active" ) }
              >
                Contact
                <span className="hover-line" style={style_link_hover}></span>
              </Link>
            </nav>
          </header> 
      </>
        
    )
}

export default Header
