import { useContext, useCallback } from 'react';
import { StateContext } from "../context/State";
// import isTouchDevice from "../utils/isTouchDevice";


const useCursorHandlers = (options = {}) => {

  // console.log("useCursorHandlers" )

  // if (isTouchDevice) {
  //   return options;
  // }

  const {setCursor} = useContext(StateContext);
  
  // const toggleCursor = () => {
  //   setCursor(({ active }) => ({ active: !active }));
  // };
  
  // eslint-disable-next-line
  const onMouseEnter = useCallback(event => {
    
    if (options.onMouseEnter) {
      options.onMouseEnter(event);
    }
    // toggleCursor();
    setCursor(({active}) => ({active: true }));
  }); 
  
  // eslint-disable-next-line
  const onMouseLeave = useCallback(event => {
    
    if (options.onMouseLeave) {
      options.onMouseLeave(event);
    }
    // toggleCursor();
    setCursor(({active}) => ({active: false }));
  }); 
  
  return { onMouseEnter, onMouseLeave };
};

export default useCursorHandlers