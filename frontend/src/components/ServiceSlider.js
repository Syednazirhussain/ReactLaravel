import React, {useState, useEffect, useContext } from 'react'
import serviceData from '../data/serviceData'

import useCursorHandlers from "../hooks/useCursorHandlers";

import { StateContext } from "../context/State";

function ServiceSlider() {
    
    const { settings } = useContext(StateContext);
    let style_headings = { fontFamily: settings.headings_font_family, color: settings.headings_color, fontSize: settings.headings_size, fontWeight: settings.headings_weight, textAlign: settings.headings_desktop_align }
    
    const { services } = useContext(StateContext);
    
        // eslint-disable-next-line
    const [serviceList, setserviceList] = useState(serviceData);
    const [index, setIndex] = useState(0);
    const [hover, setHover] = useState(false);

    const cursorHandlers = useCursorHandlers();


    // console.log( "S-------", services )
    // console.log( "T-------", serviceList )
    
    useEffect(() => {
        const lastIndex = services.length - 1
        
        if (index < 0){
            setIndex(lastIndex)
        }
        if (index > lastIndex){
            setIndex(0) 
        }

    },[index, services])

    useEffect(() => {
        let slider = setInterval( () => {
            if (hover===true){
                setIndex(index+1)
            }
        }, 500)
        return () => clearInterval(slider)        
    }, [hover, index]);
    

    return (
        <section className="section">
            <div className="section-center" onMouseMove={ () => setHover(true) } onMouseEnter={ () => setHover(true) } onMouseLeave={() => setHover(false)}>
            {           
                services.map( (s, sId) => {
                    let position = 'nextSlide'
                    
                    if (sId === index){
                        position = 'activeSlide'
                    }
        
                    if (sId === index - 1 || (index === 0 && sId === services.length - 1) ){
                        position = 'lastSlide'
                    }
                    
                    return (
                        <article className={position} key={s.id}>
                            <h2 className="slide-header"
                                {...cursorHandlers}
                                style={style_headings}>{s.title}</h2>
                        </article>  
                    )   
                })                 
            }            
            </div>
        </section>
        
    )
}

export default ServiceSlider
