import React, {useContext, useState, useEffect} from "react";
import useMousePosition from "../hooks/useMousePosition";
import { StateContext } from "../context/State";

const Cursor = () => {
 
  const { settings } = useContext(StateContext);

  const { clientX, clientY } = useMousePosition();
  const {cursor} = useContext(StateContext);
  const [isVisible, setIsVisible] = useState(false);
  
  useEffect(() => {
    const handleMouseEnter = () => setIsVisible(true);
    const handleMouseLeave = () => setIsVisible(false);
    document.body.addEventListener("mouseenter", handleMouseEnter);
    document.body.addEventListener("mouseleave", handleMouseLeave);
    return () => {
      document.body.removeEventListener("mouseenter",   handleMouseEnter);
      document.body.removeEventListener("mouseleave", handleMouseLeave);
    };
  }, []);


  return (
    <>
      <div className="cursor-main-container" data-dd={settings.cursor_blend_mode}
        style={{
          opacity: cursor.active ? 0 : 1,
          transition: "all 0.5s ease-out",
          mixBlendMode: ( settings.cursor_blend_mode === 1 ) ? "difference" : "none" 
        }}
      >
        <div className="cursor-main"
          style={{
            border: `${settings.cursor_border_size} solid ${settings.cursor_color}`,
            fontFamily: settings.body_font_family,
            left: clientX,
            top: clientY,
            transform: `translate(-50%, -50%)`,
            opacity: isVisible ? 1 : 0,
          }}
        >
            <span>{`${settings.cursor_circle_text}`}</span>
           
        </div>
      </div>
      <img 
          style={{
            position: 'absolute',
            left: clientX,
            top: clientY,
            transform: `translate(-50%, -50%)`,
            marginTop: `-70px`,
            marginLeft: `50px`,
            opacity: cursor.active ? 0 : 1,
            display: cursor.active ? `none` : `block`,
          }}
          className="cursor-main-img"
          src={`${process.env.REACT_APP_UPLOADS_URL}/${settings.cursor_icon_url}`} alt="cursor-flower" />

      <div className="cursor-secondary-container" 
        style={{
          position: 'absolute',
          opacity: cursor.active ? 1 : 0,
          transition: "all 0.5s ease-out",
        }}
      >
        <div className="cursor-secondary"
            style={{
              border: `${settings.cursor_border_size} solid transparent`,
              fontFamily: settings.body_font_family,
              position: 'absolute',
              left: clientX,
              top: clientY,
              transform: `translate(-50%, -50%)`,
              opacity: isVisible ? 1 : 0
          }}
        >
          <img 
              src={`${process.env.REACT_APP_UPLOADS_URL}/${settings.cursor_icon_url}`} alt="cursor-flower"
          />
        </div>
      </div>
    </>
  );
};

export default Cursor