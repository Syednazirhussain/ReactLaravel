import { useContext } from 'react'
import useCursorHandlers from "../hooks/useCursorHandlers";
import {useLocation, Link} from 'react-router-dom'
import { MobileView } from 'react-device-detect';
import { StateContext } from "../context/State";

function Footer(){

  const { settings } = useContext(StateContext);
  let style_links = { fontFamily: settings.links_font_family, fontSize: settings.links_size, color: settings.links_color, fontWeight: settings.links_weight }
  
  const style_link_hover = { backgroundColor: settings.hover_border_color, height: settings.hover_border_size }

  const cursorHandlers = useCursorHandlers();

  const {openModal} = useContext(StateContext)
 
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
      <footer className="page-footer">
        <nav>
          <Link 
            onClick={(e) => e.stopPropagation()} 
            {...cursorHandlers}
            to="/service"
            style={style_links}
            className={ "nav-link " + (splitLocation[1] === "service" ? "active" : "non-active") }
          >
            Services
            <span className="hover-line" style={style_link_hover}></span>
          </Link>
          <MobileView>  
          <button className='open-modal-btn' onClick={openModal}
                  style={{
                    border: `${settings.cursor_border_size} solid ${settings.cursor_color}`,
                    fontFamily: settings.body_font_family,
                  }}
            >
            {settings.cursor_circle_text}
            <img className="mobile-play-btn-flower"
              src={process.env.PUBLIC_URL + `/images/red-flower.svg`}
              alt="cursor-flower"
            />
          </button>
           
          </MobileView>
          
          <Link 
            onClick={(e) => e.stopPropagation()} 
            {...cursorHandlers} 
            to="/client"
            style={style_links}
            className={ "nav-link " + (splitLocation[1] === "client" ? "active" : "non-active") }
          >
            Clients
            <span className="hover-line" style={style_link_hover}></span>
          </Link>
        </nav>
      </footer>
    )
}

export default Footer
