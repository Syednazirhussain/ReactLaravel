import React, {useState, useContext} from 'react'
import { motion, AnimatePresence } from "framer-motion"
import Loader from '../components/Loader';
import { StateContext } from "../context/State";

import useCursorHandlers from "../hooks/useCursorHandlers";

function Contact() {

    const { settings } = useContext(StateContext);
    const { pages } = useContext(StateContext);
    const cursorHandlers = useCursorHandlers();
    const [loading, setLoading] = useState(true);


    // styles
    let style_headings = { fontFamily: settings.headings_font_family, color: settings.headings_color, fontSize: settings.headings_size, fontWeight: settings.headings_weight, textAlign: settings.headings_desktop_align }
    let style_body = { fontFamily: settings.body_font_family, color: settings.body_color, fontSize: settings.body_size, fontWeight: settings.body_weight, textAlign: settings.body_desktop_align }
    let style_bg = { backgroundColor: settings.background_color }
    let style_wrapper = { padding: settings.padding_body_size, backgroundColor: settings.padding_body_color }
    
    if( settings.background_image_url !== null ) {
        style_bg = { backgroundColor: settings.background_color, backgroundImage: `url(${process.env.REACT_APP_UPLOADS_URL}/${settings.background_image_url})` }
    }


    const style_link_hover = { backgroundColor: settings.hover_border_color, height: settings.hover_border_size }

    const {mediaQuery} = useContext(StateContext) ;
    const mq = window.matchMedia(mediaQuery);
    if (mq.matches) {

        style_headings = { fontFamily: settings.headings_font_family_mobile, color: settings.headings_color_mobile, fontSize: settings.headings_size_mobile, fontWeight: settings.headings_weight_mobile, textAlign: settings.headings_desktop_align_mobile }

        style_body = { fontFamily: settings.body_font_family_mobile, color: settings.body_color_mobile, fontSize: settings.body_size_mobile, fontWeight: settings.body_weight_mobile, textAlign: settings.body_desktop_align_mobile }
        
    }


    return (
        <AnimatePresence>
            { loading &&
                (
                    <motion.div key="pre-loader">
                        <Loader setLoading={setLoading} />
                    </motion.div> 
                )
            }
                    <div className="wrapper" style={ style_wrapper }>
                        
                        <main className="page-main" style={style_bg}>
                            <h6 style={style_body}
                                dangerouslySetInnerHTML={{__html: pages[1]?.content }}
                            ></h6>
                            
                            {/* hi@nakiskashaikh.com */}
                            <h2 onClick={() => window.location = `mailto:${pages[1]?.description}`}
                                {...cursorHandlers}
                                style={style_headings}
                                >
                                <span className="contact-lead non-active">
                                {pages[1]?.description}
                                    <span className="hover-line" style={ style_link_hover }></span>
                                </span>
                            </h2>
                            
                        </main>
                        
                    </div>
                
            
        </AnimatePresence>                
    )
}

export default Contact
